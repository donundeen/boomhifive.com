	/*
// +----------------------------------------------------------------------+
// | Copyright (c) 2004 Bitflux GmbH                                      |
// +----------------------------------------------------------------------+
// | Licensed under the Apache License, Version 2.0 (the "License");      |
// | you may not use this file except in compliance with the License.     |
// | You may obtain a copy of the License at                              |
// | http://www.apache.org/licenses/LICENSE-2.0                           |
// | Unless required by applicable law or agreed to in writing, software  |
// | distributed under the License is distributed on an "AS IS" BASIS,    |
// | WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or      |
// | implied. See the License for the specific language governing         |
// | permissions and limitations under the License.                       |
// +----------------------------------------------------------------------+
// | Author: Bitflux GmbH <devel@bitflux.ch>                              |
// +----------------------------------------------------------------------+

*/
var liveSearchReq = false;
var t = null;
var liveSearchLast = "";
	
var isIE = false;
// on !IE we only have to initialize it once
if (window.XMLHttpRequest) {
	liveSearchReq = new XMLHttpRequest();
}

function isArray(a) {
    return isObject(a) && a.constructor == Array;
}

function isObject(a) {
    return (a && typeof a == 'object') || isFunction(a);
}

function isFunction(a) {
    return typeof a == 'function';
}

var currentElement;

function liveSearchInit(formname, element_names) {
	if(!isArray(element_names)){
		element_names = new Array(element_names);
	}
	if(document.getElementById(formname)){
		if (navigator.userAgent.indexOf("Safari") > 0) {
				document.getElementById(formname).addEventListener("keydown",function (event){liveSearchKeyPress(formname, event)},false);
		} else if (navigator.product == "Gecko") {
				document.getElementById(formname).addEventListener("keypress",function (event){liveSearchKeyPress(formname, event)},false);
				document.getElementById(formname).addEventListener("blur",function (event){liveSearchHideDelayed(formname)},false);
		} else {

//				document.getElementById(formname).attachEvent('onkeydown',function (event){liveSearchKeyPress(formname, element_name, event)});
				document.getElementById(formname).attachEvent('onkeydown',function (event){liveSearchKeyPress(formname, event)});
		//		document.getElementById('livesearch').attachEvent("onblur",liveSearchHide,false);
			isIE = true;
		}
		
		document.getElementById(formname).setAttribute("autocomplete","off");
	}
}

function liveSearchHideDelayed(formname) {
	element_name = currentElement;
	window.setTimeout("liveSearchHide('" + formname +"','"+element_name+"')",400);
}
	
function liveSearchHide(formname) {
	element_name = currentElement;
	document.getElementById(formname + "_" +element_name + "_LSResult").style.display = "none";
	var highlight = document.getElementById("LSHighlight");
	if (highlight) {
		highlight.removeAttribute("id");
	}
}

function liveSearchKeyPress(formname, event) {
	element_name = currentElement;
	
	if (event.keyCode == 40 )
	//KEY DOWN
	{
		highlight = document.getElementById("LSHighlight");
		if (!highlight) {
			if(!document.getElementById(formname + "_" + element_name + "_LSShadow").firstChild){
				alert( "tried "+ formname + ", "+ element_name +" firstchild, no luck");
			}
			highlight = document.getElementById(formname + "_" + element_name + "_LSShadow").firstChild.firstChild;
		} else {
			highlight.removeAttribute("id");
			highlight = highlight.nextSibling;
		}
		if (highlight) {
			highlight.setAttribute("id","LSHighlight");
		} 
		if (!isIE) { event.preventDefault(); }
	} 
	//KEY UP
	else if (event.keyCode == 38 ) {
		highlight = document.getElementById("LSHighlight");
		if (!highlight) {
			highlight = document.getElementById(formname + "_" + element_name + "_LSResult").firstChild.firstChild.lastChild;
		} 
		else {
			highlight.removeAttribute("id");
			highlight = highlight.previousSibling;
		}
		if (highlight) {
				highlight.setAttribute("id","LSHighlight");
		}
		if (!isIE) { event.preventDefault(); }
	} 
	//ESC
	else if (event.keyCode == 27) {
		highlight = document.getElementById("LSHighlight");
		if (highlight) {
			highlight.removeAttribute("id");
		}
		document.getElementById(formname + "_" + element_name + "_LSResult").style.display = "none";
	} 
}


function liveSearchStart(formname, element_name, type, url ) {
	currentElement = element_name;		
	if (t) {
		window.clearTimeout(t);
	}
	t = window.setTimeout("liveSearchDoSearch('" + formname + "', '" + element_name + "', '" + type + "', '" +escape(url) +"')",200);
}

function liveSearchDoSearch(formname, element_name, type, url) {

	if(!url || url == ""){
		url = "livesearch.php";
	}
	url = escape(url);
	if (typeof liveSearchRoot == "undefined") {
		liveSearchRoot = "";
	}
	if (typeof liveSearchRootSubDir == "undefined") {
		liveSearchRootSubDir = "";
	}
	if (typeof liveSearchParams == "undefined") {
		liveSearchParams = "";
	}
	if(!document.getElementById(formname)){
		alert ("tried "+ formname + ", with no luck");
	}
	
	eval("var theValue =  document.getElementById(formname)." + element_name + ".value;");
	if (liveSearchLast != theValue) {
		if (liveSearchReq && liveSearchReq.readyState < 4) {
			liveSearchReq.abort();
		}
		if ( theValue == "") {
			liveSearchHide(element_name);
			return false;
		}
		if (window.XMLHttpRequest) {
		// branch for IE/Windows ActiveX version
		} else if (window.ActiveXObject) {
			liveSearchReq = new ActiveXObject("Microsoft.XMLHTTP");
		}
		liveSearchReq.onreadystatechange= function (event){liveSearchProcessReqChange(formname, element_name)};
		liveSearchReq.open("GET", liveSearchRoot + url + "?formname="+ formname + "&element_name=" + element_name + "&type=" + type + "&name=" + theValue + liveSearchParams);
		liveSearchLast = theValue;
		liveSearchReq.send(null);
	}
}

function liveSearchProcessReqChange(formname, element_name) {
	if (liveSearchReq.readyState == 4) {
//		window.alert(type + "_LSResult");
		var  res = document.getElementById(formname + "_" + element_name + "_LSResult");
		res.style.display = "block";
		var  sh = document.getElementById(formname + "_" + element_name + "_LSShadow");
		
		sh.innerHTML = liveSearchReq.responseText;
		 
	}
}

function liveSearchSubmit() {
	var highlight = document.getElementById("LSHighlight");
	if (highlight && highlight.firstChild) {
//		document.forms.searchform.entity2_name.value = name;
		window.location = liveSearchRoot + liveSearchRootSubDir + highlight.firstChild.getAttribute("href");
		return false;
	} 
	else {
		return true;
	}
}

function set_name(formname, element_name, name){
	eval("document.getElementById('"+ formname+"')." + element_name + ".value = name;");
}