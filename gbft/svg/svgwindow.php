<html>
<head>
<script>

function imTold(obj){
	alert("svg told " + obj);
}



function tellXMLWindow(obj){
	window.opener.tellXMLWindow(obj);
}

function svgWindowOpened(){
	window.opener.svgWindowOpened();	
}


</script>

</head>
<body onLoad="svgWindowOpened();">
<a href="javascript:tellXMLWindow('telling you, xml!');">Tell xml</a>
parent here
</body>

</html>