<?php
include_once("setup.php");



$smarty->assign("ERROR_MSGS", $ERROR_MSGS);



$smarty->assign("return_page", $input->vars['return_page']);

if($input->results['user_registered'] == true){
	$smarty->assign("user_registered", true);
}


$smarty->display("new_user.tpl");

