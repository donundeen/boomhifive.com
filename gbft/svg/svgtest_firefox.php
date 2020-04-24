<html>
<head> 
<title>svg test</title>
<script language="JavaScript">


////////////////////////////////////////////////
// SET INTERVAL FIX
///////////////////////////////////////////////
// This script can be reused as long as the following 
// copyright notice is not removed.  
// SetInterval and ClearInterval Compatibility Script
// Copyright 1999 InsideDHTML.com, LLC. All rights reserved
// See www.insideDHTML.com for more information.

var aTracking = new Array()

var version = parseInt(navigator.appVersion)
var appName = navigator.appName
var ns4 = version>=4 && appName=="Netscape"
function runInterval(sIndex) {
	if (aTracking[sIndex]) {
		var args = aTracking[sIndex].arguments
		// Call function and pass in any extra argument
		var callargs="aTracking[sIndex].code(";
		for(i=0;i < args.length;++i) {
			callargs = callargs + "args["+i+"]";
			if(i < args.length - 1) callargs += ",";
		}
		
		callargs = callargs + ")";
		eval(callargs);
		// Start up timer for next iteration
		aTracking[sIndex].timerID = setTimeout("runInterval(" + sIndex + ")",aTracking[sIndex].interval)
	}
}

function newSetInterval(func,interval) {
	var fCall = func
	if (typeof func!="function")
	var fCall= new Function(func)
	var nextIdx = aTracking.length
	aTracking[nextIdx] = new Object
	aTracking[nextIdx].interval = interval
	aTracking[nextIdx].code = fCall
	aTracking[nextIdx].arguments = new Array()
	for (var i=2;i < arguments.length;i++)
	aTracking[nextIdx].arguments[aTracking[nextIdx].arguments.length] = arguments[i]
	aTracking[nextIdx].timerID = setTimeout("runInterval(" + nextIdx + ")",interval)
	return nextIdx
}

function newClearInterval(idx) {
	if (aTracking[idx]) {
		clearTimeout(aTracking[idx].timerID)
		aTracking[idx] = null
	}
}

if (!ns4) {
	window.setInterval = newSetInterval
	window.clearInterval = newClearInterval
}



///  END SET INTERVAL FIX
//////////////////////////////////////////////////////////////////////////




var r1 = 2;
var r2 = 100;
var circles = Array(0);
var numCircles = 50;
var inited = false;
var svgdoc;
var nodeConns = new Array();

var safety = 0;

var interval = 100;

var COULOMBS_CONSTANT = 8.9875e9;

var fricCoef = .001;
var elecForceConst = COULOMBS_CONSTANT;
var maxElecForceDist = 400;
var springConstant = .0005;

var chargeMultiplier = 0.0010;
var massMultiplier = 1;

var idealSpringLength = 30;
var maxNodeMovement = 50;



function init(){
	if(!inited){
		inited = true;
		
		svgdoc = document.sv.getSVGDocument();

		var nodes = xmlDoc.getElementsByTagName("node");
		
		for(i = 0; i < nodes.length; i++){
			children = nodes[i].childNodes;
			group = children[0];
			node = nodeToSvg(group);
			svgdoc.documentElement.appendChild(node);
			
			initNode(node);
		}
		
		var connections = xmlDoc.getElementsByTagName("connection");
		
		for(i = 0; i < connections.length; i++){
			children = connections[i].childNodes;
			conn = children[0];

			line = nodeToSvg(conn);
			svgdoc.documentElement.appendChild(line);
			
			initLine(line);
		}
	}
}

function nodeToSvg(node){
	var i;
	var attvalue;
	var data;
	
	var name = node.nodeName;
	if(node.nodeType == 3){
		var elem = svgdoc.createTextNode(node.data);
		return elem;
	}

	var elem = svgdoc.createElement(name);
	
	for(i = 0; i < node.attributes.length; i++){
		elem.setAttribute(node.attributes[i].nodeName, node.attributes[i].nodeValue);
	}	
	
	var children = node.childNodes;
	for(i = 0; i < children.length; i++){
		childelem = nodeToSvg(children[i]);
		elem.appendChild(childelem);
	}	
	
	return elem;
}

function doNode(node){
	applyTransform(node);
}


function applyTransform(node){

	safety++;
	if(safety > 100){
	//	alert("exiting");
//exit();
	}
	
	coords = getNodeNextPos(node);
	var x = coords[0];
	var y = coords[1];
	

	if(x > 300){
		x = 300;
	}
	if(y > 300){
		y = 300;
	}
	if(x < 0){
		x = 0;
	}
	if(y < 0){
		y = 0;
	}
	moveNodeTo(node, x, y);	
}






function initNode(node){


	if(node.getAttribute("inited") != "true"){
	
	 	var id = node.getAttribute("id");

	 	if(!nodeConns[id]){
	 		nodeConns[id] = new Array();
	 	}	

		var x = Math.floor(Math.random() * 100);	
		var y = Math.floor(Math.random() * 100);

		moveNodeTo(node, x, y);
	
		node.setAttribute("inited", "true");
	
		setInterval(doNode, interval, node);
	}	
}

/*
function addNode(evt){
	var node = evt.getTarget().getParentNode();
	initNode(node);
}
*/


function initLine(line){
	var line_id = line.getAttribute("id");

	var node1_id = line.getAttribute("node1");
	node1 = svgdoc.getElementById(node1_id);
	var node2_id = line.getAttribute("node2");
	node2 = svgdoc.getElementById(node2_id);

	addConnectionToNode(node1_id, line_id);
	addConnectionToNode(node2_id, line_id);
	
}

function addConnectionToNode(node_id, conn_id){
	var connArray = nodeConns[node_id];
	if(!connArray){
		connArray = new Array();
	}
	connArray[conn_id] = conn_id;
	nodeConns[node_id] = connArray;	
}


function getNodeNextPos(node){
	var node_id = node.getAttribute("id");
	var force = new Array(0,0);
	
	// get push force.
	var actingForce = new Array(2);
	for(node2_id  in nodeConns){
		if(node2_id != node_id){
			var node2 = svgdoc.getElementById(node2_id);
			actingForce = getElectricForce(node, node2);
			force[0] -= actingForce[0];
			force[1] -= actingForce[1];
		}
 	}
	// get pull force
	for(line_id in nodeConns[node_id]){
		var line = svgdoc.getElementById(line_id);
		node2_id = line.getAttribute("node1");
		if(node2_id == node_id){
			node2_id = line.getAttribute("node2");
		}
		node2 = svgdoc.getElementById(node2_id);
		actingForce = getElasticForce(node, node2);
		
		force[0] += actingForce[0];
		force[1] += actingForce[1];
		
		
		
	}
	var coords = getNodeCoords(node);
	
	coords[0] += force[0];
	coords[1] += force[1];
	return coords;
}



function getElasticForce(node1, node2){
	var node1_coords = getNodeCoords(node1);
	var node2_coords = getNodeCoords(node2);
	
	var distance = nodeDistance(node1, node2);
	

	
    var disp = distance - idealSpringLength;
    var dx = node2_coords[0] - node1_coords[0];
    var dy = node2_coords[1] - node1_coords[1];
    var forceVector = springConstant * Math.pow(disp, 2.0);
    
    var forceX = forceVector * dx / distance;
    var forceY = forceVector * dy / distance;
    
    
	return new Array(forceX, forceY);
}

function getElectricForce(node1, node2, connection){
	var distance = nodeDistance(node1, node2);
	
	
    if (distance < maxElecForceDist) {
		var node1_coords = getNodeCoords(node1);
		var node2_coords = getNodeCoords(node2);

		var dx = node2_coords[0] - node1_coords[0];
		var dy = node2_coords[1] - node1_coords[1];
		var forceVector = elecForceConst * chargeMultiplier * getElecCharge(node1) * chargeMultiplier * getElecCharge(node1) /  Math.pow(distance, 2.0);
		
//		alert("forceVector =  "  + elecForceConst  + " *  " + chargeMultiplier  + " * " + getElecCharge(node1) + " * " + chargeMultiplier +" * " + getElecCharge(node1) + " /   " + Math.pow(distance, 2.0));
		
		var forceX = forceVector * dx / distance;
		var forceY = forceVector * dy / distance;

    }
	return new Array(forceX, forceY);
	
}



function getElecCharge(node){
	return 1.0;
}

function moveNodeTo(node, x, y){

	node.setAttribute("transform", "matrix(1, 0, 0, 1, "+ x +  ", "+ y +  ")");

	
	// get all connection lines for node, and move them.
	var node_id = node.getAttribute("id");
	for (line_id in nodeConns[node_id]){
		line = svgdoc.getElementById(line_id);
		var node1_id = line.getAttribute("node1");
		var node2_id = line.getAttribute("node2");
		if(node1_id == node_id){
			setLinePoint1(line, x, y);
		}
		if(node2_id == node_id){
			setLinePoint2(line, x, y);
		}
	}	
}


function getNodeCoords(node){
	var ctm = node.getCTM();
	var x = ctm.e;
	var y = ctm.f;
	return new Array(x,y);
	
}


function moveLineTo(line, x1, y1, x2, y2){
	var dx = x1 - x2;
	var dy = y1 - y2;

	
	
}


function setLinePoint1(line, x , y){
	line.setAttribute("x1", x);
	line.setAttribute("y1", y);
}

function setLinePoint2(line, x, y){
	line.setAttribute("x2", x);
	line.setAttribute("y2", y);
}

function lineLength(line){
	return getDistance(line.getAttribute("x1"),	line.getAttribute("y1"), line.getAttribute("x2"), line.getAttribute("y2"));
}

function nodeDistance(node1, node2){
	coord1 = getNodeCoords(node1);
	coord2 = getNodeCoords(node2);
	return getDistance(coord1[0], coord1[1], coord2[0], coord2[1]); 
	
}

function getDistance(x1, y1, x2, y2){
	return Math.sqrt(Math.pow(x2- x1, 2) + Math.pow(y2 - y1, 2));	
}




</script>

<xml id="xmlDoc">
<allData>
<nodes>
<node>
<g id="node1"  >
<circle  cx="0" cy="0" r="10" fill="blue" />
<text x="0" y="0" >node1</text>
</g>
</node>
<node>
<g id="node2" >
<circle  cx="0" cy="0" r="10" fill="blue" />
<text x="0" y="0" >node2</text>
</g>
</node>
<node>
<g id="node3" >
<circle  cx="0" cy="0" r="10" fill="blue" />
<text x="0" y="0" >node3</text>
</g>
</node>
<node>
<g id="node4" >
<circle  cx="0" cy="0" r="10" fill="blue" />
<text x="0" y="0" >node4</text>
</g>
</node>
<node>
<g id="node5" >
<circle  cx="0" cy="0" r="10" fill="blue" />
<text x="0" y="0" >node5</text>
</g>
</node>
<node>
<g id="node6" >
<circle  cx="0" cy="0" r="10" fill="blue" />
<text x="0" y="0" >node6</text>
</g>
</node>
<node>
<g id="node7" >
<circle  cx="0" cy="0" r="10" fill="blue" />
<text x="0" y="0" >node7</text>
</g>
</node>
<node>
<g id="node8" >
<circle  cx="0" cy="0" r="10" fill="blue" />
<text x="0" y="0" >goodbye</text>
</g>
</node>
</nodes>
<connections>
<connection >
<line  id="line1" x1="0" y1="0" x2="0" y2="0" fill="black" node1="node8" node2="node1"/>
</connection>
<connection >
<line  id="line2" x1="0" y1="0" x2="0" y2="0" fill="black" node1="node7" node2="node2"/>
</connection>
<connection >
<line  id="line3" x1="0" y1="0" x2="0" y2="0" fill="black" node1="node6" node2="node1"/>
</connection>
<connection >
<line  id="line4" x1="0" y1="0" x2="0" y2="0" fill="black" node1="node5" node2="node6"/>
</connection>
<connection >
<line  id="line5" x1="0" y1="0" x2="0" y2="0" fill="black" node1="node4" node2="node6"/>
</connection>
<connection >
<line  id="line6" x1="0" y1="0" x2="0" y2="0" fill="black" node1="node1" node2="node6"/>
</connection>
<connection >
<line  id="line7" x1="0" y1="0" x2="0" y2="0" fill="black" node1="node1" node2="node7"/>
</connection>
<connection >
<line  id="line8" x1="0" y1="0" x2="0" y2="0" fill="black" node1="node1" node2="node8"/>
</connection>
</connections>
</allData>
</xml>

</head>
<body >


<embed name=sv src=test.svg width=288 height=360></embed>
<form name=f>
<input type=button value=click onclick="init();">
</form>
</body>
</html>