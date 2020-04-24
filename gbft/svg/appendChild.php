<html>
<head> 
<title>svg test</title>
<script language="JavaScript">

var svgns = "http://www.w3.org/2000/svg";

function init(evt){
	alert("initing");
	svgdoc = document.sv.getSVGDocument();

	alert(svgdoc);
	
	elem = svgdoc.createElementNS(svgns, "circle");

	alert(elem);
	elem.setAttribute("cx", 20);
	elem.setAttribute("cy", 20);
	elem.setAttribute("r", 20);
	elem.setAttribute("fill", "black");
	
	elem = svgdoc.documentElement.appendChild(elem);
	
}

</script>


</head>
<body >


<embed name=sv src=test.svg width=288 height=360></embed>
<form name=f>
<input type=button value=click>
</form>
</body>
</html>