<?php
header("Content-type: text/xml");
include_once("setup.php");

include_once(dirname(__FILE__)."/classes/class.entity.php");

$type = $input->vars['type'];
$id = $input->vars['id'];


if(!in_array($type, array('band','musician'))){
	exit();
}

$entity = new Entity($type, $id);

if(is_object($SESSION->user)){
	$entity->set_user($SESSION->user);
}

$entity->populate_entity();

if($type == 'member' && $entity->info['public_visible'] == 'n'){
	if(is_object($SESSION->user) && $SESSION->user->info['ID'] == $entity->id){
	}else{
		// this page shouldn't be visible, so we redirect to the index page, send an error message, or something...
		
		echo "This Member's page is private";
		exit();	
		
	}	
	
}


//echo "<pre>".print_r($entity, true)."</pre>";

$user_subscription_level = $SESSION->user->join_info[$type]['approved'][$id]['subscription_level'];
$smarty->assign("user_subscription_level", $user_subscription_level);

unset($entity->conn);
$smarty->assign("entity",$entity);
$smarty->assign("ERROR_MSGS", $ERROR_MSGS);

$smarty->display("entityxml.tpl");

