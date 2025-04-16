<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once("config.php");
include_once("classes/class.gbft.php");



$conn = gbft::static_get_conn();

//$conn->debug = true;

$request = $_GET['name'];
$type = $_GET['type'];
$element_name = $_GET['element_name'];
$formname = $_GET['formname'];
if(strlen($element_name) == 0){
	$element_name = "entity2_name";
}
if(strlen($formname) == 0){
	$formname = $type."_searchform";
}
//$type = "musician";

$query = "SELECT 
			ID,
			name
			FROM
		$type
			WHERE
			name like '".$conn->qstr($request)."%'
		group by
			name
		order by
			name";

//echo $query;
//$conn->debug=true;
$rows = $conn->GetArray($query);

?><div class="LSRes"><?php
?><div class="LSRow"><a href="javascript:set_name('<?=$formname?>','<?=$element_name?>','');"><font style="normal" color=black>pick a <?=$type?> or keep typing</font></a></div><?php
print("rows:".print_r($rows,true));
if(is_array($rows)){
	foreach($rows as $row){
		print_r($row);
		$name = $row['name'];
		?><div class="LSRow"><a href="javascript:set_name('<?=$formname?>','<?=$element_name?>','<?=addslashes($name)?>');"><?=$name?></a></div><?php
		$i++;
	}
}
?>
</div>
