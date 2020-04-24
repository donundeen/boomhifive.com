<?
include_once("setup.php");
include_once("classes/class.search.php");

$search = new Search();

$search->populate();

$smarty = $search->process_tpl($smarty);

$smarty->display('search.tpl');


?>