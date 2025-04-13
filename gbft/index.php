<?php

include_once("setup.php");

include_once(dirname(__FILE__)."/classes/class.index.php");

$type = $input->vars['type'];
$id = $input->vars['id'];

$index = new Index($type, $id);

if(is_object($SESSION->user)){
	$index->set_user($SESSION->user);
}

$index->populate_index();



//echo "<pre>".print_r($entity, true)."</pre>";

$user_subscription_level = $SESSION->user->join_info[$type]['approved'][$id]['subscription_level'];
$smarty->assign("user_subscription_level", $user_subscription_level);

unset($index->conn);
$smarty->assign("index",$index);
$smarty->assign("ERROR_MSGS", $ERROR_MSGS);

$smarty->display("index.tpl");
//$smarty->display("./classes/SmartyTemplate/debug.tpl");

