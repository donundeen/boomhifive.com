<?php
include_once("setup.php");

include_once(dirname(__FILE__)."/classes/class.entity.php");

$type = $input->vars['type'];
$id = $input->vars['id'];

print __FILE__.":".__LINE__."<BR>\n";

$entity = new Entity($type, $id);
print __FILE__.":".__LINE__."<BR>\n";

if(is_object($SESSION->user)){
	$entity->set_user($SESSION->user);
}

$entity->populate_entity();


if($type == 'member' && $entity->info['public_visible'] == 'n'){
	if(is_object($SESSION->user) && $SESSION->user->info['ID'] == $entity->id){
	}else{
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

$smarty->display("entity.tpl");

