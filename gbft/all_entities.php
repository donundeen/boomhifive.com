<?php
include_once("setup.php");

include_once(dirname(__FILE__)."/classes/class.all_entities.php");

$type = $input->vars['type'];


$all_entities = new all_entities($type);

if(is_object($SESSION->user)){
	$entity->set_user($SESSION->user);
}

$all_entities->populate();


//echo "<pre>".print_r($entity, true)."</pre>";

$user_subscription_level = $SESSION->user->join_info[$type]['approved'][$id]['subscription_level'];
$smarty->assign("user_subscription_level", $user_subscription_level);

unset($all_entities->conn);
$smarty->assign("all_entities",$all_entities);
$smarty->assign("ERROR_MSGS", $ERROR_MSGS);

$smarty->display("all_entities.tpl");

?>