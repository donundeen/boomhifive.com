<html>
<head>
<script>

function openthem(){
	xmlwindow = window.open("xmlwindow.php", 'xmlwindow');	
	svgwindow = window.open("svgwindow.php", 'svgwindow');	
}

function tellSVGWindow(obj){
	svgwindow.imTold(obj);
}

function tellXMLWindow(obj){
	xmlwindow.imTold(obj);
}

function svgWindowOpened(){
	alert("svg window opened!");	
}

function xmlWindowOpened(){
	alert("xml window opened");	
}



</script>

</head>
<body onload="openthem();">
<a href="javascript:tellSVGWindow('Imtellin1');">tell SVG</a>
<a href="javascript:tellXMLWindow('Imtellin2');">XML</a>
parent here
</body>

</html>