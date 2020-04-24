<html>
<head>

<script>


function imTold(obj){
	alert("xml told " + obj);
	
}

function tellSVGWindow(obj){
	window.opener.tellSVGWindow(obj);
}

function xmlWindowOpened(){
	window.opener.xmlWindowOpened();	
}

</script>

</head>
<body onLoad="xmlWindowOpened();">
child here
<a href="javascript:tellSVGWindow('telling you, svg!');">Tell SVG</a>
</body>

</html>


