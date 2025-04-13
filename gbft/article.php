<?php
$type = $_REQUEST['TYPE'];
$id = $_REQUEST['ID'];

$link= "entity.php?type=$type&id=$id";

//echo $link;

header("Location: $link");


