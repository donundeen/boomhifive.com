<?
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
			name like '".mysql_escape_string($request)."%'
		group by
			name
		order by
			name";

//echo $query;
//$conn->debug=true;
$rows = $conn->GetArray($query);

?><div class="LSRes"><?
?><div class="LSRow"><a href="javascript:set_name('<?=$formname?>','<?=$element_name?>','');"><font style="normal" color=black>pick a <?=$type?> or keep typing</font></a></div><?
if(is_array($rows)){
	foreach($rows as $row){
		$name = $row['name'];
		?><div class="LSRow"><a href="javascript:set_name('<?=$formname?>','<?=$element_name?>','<?=addslashes($name)?>');"><?=$name?></a></div><?
		$i++;
	}
}
?></div>