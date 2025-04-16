<html>
	<head>
		<script language="javascript" type="text/javascript" 
			src="internal_request.js">

		</script>
		<link rel="stylesheet" type="text/css" href="style.css">		
	</head>
	<body onload="liveSearchInit()">
	
	You submitted  <?=$_GET['q']?><BR>
	<form name="searchform" id="searchform"  onsubmit="return liveSearchSubmit()">
	<input type="text" class="livesearch", name="q"  onkeypress="liveSearchStart()" >
	<div id="LSResult" style="display: none;"><div id="LSShadow"></div></div>
	</form>
	
	
	
	</body>
	</html>