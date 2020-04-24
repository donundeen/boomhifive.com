<html>
<head>
<script>

function imTold(obj){
	alert("opened told " + obj);
}



function tellOpened(obj){
	window.opener.tellOpened(obj);
}

function openerHere(){
	window.openeer.openerHere();	
}


</script>

</head>
<body onLoad="openerHere()">
<a href="javascript:tellOpened('telling you, opened!');">Tell Opened</a>
parent here
</body>

</html>