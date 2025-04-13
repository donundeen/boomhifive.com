<html>
	<head>
		<script language="javascript" type="text/javascript" 
			src="internal_request.js">

		</script>
		<link rel="stylesheet" type="text/css" href="style.css">		
	</head>
	<body>
<?php
$rows = 20;
$cols = 20;

$x = 0;
while($x < $rows){
	$y = 0;
	while($y < $cols){
		?><div class="divclass" id="<?=$x?><?=$y?>"  onMouseOver="change(<?=$rows?>,<?=$cols?>,<?=$x?>,<?=$y?>);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><?
		$y++;
	}
	$x++;	
	?>
<br clear="all"	/>
	<?php
}

?>


	</body>
</html>