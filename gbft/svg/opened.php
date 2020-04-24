<html>
<head>

<script>


function imTold(obj){
	alert("opened told " + obj);
	
}

function tellOpener(obj){
	window.opener.tellOpener(obj);
}

</script>

</head>
<body>
child here
<a href="javascript:tellOpener('telling you, opener!');">Tell Opener</a>
</body>

</html>


