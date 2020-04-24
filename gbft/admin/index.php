<?
include_once("setup.php");
include_once(dirname(__FILE__)."/../classes/class.admin_process_input.php");
include_once(dirname(__FILE__)."/../classes/class.admin_page.php");



$input = new admin_process_input();

$input->set_vars();

$input->go();



$page = new admin_page();

$page->populate();



$smarty = $page->process_tpl($smarty);


$smarty->display("admin.tpl");


?>