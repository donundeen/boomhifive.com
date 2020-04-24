<?
include_once("../config.php");

include_once("../classes/class.session.php");

include_once("../classes/SmartyTemplate/Smarty.class.php");



global $SESSION;
global $ERROR_MSGS;
$ERROR_MSGS = array();

$CITY_NAME = "Gainesville";



$smarty = new Smarty();
$smarty->template_dir = "../templates";
$smarty->compile_dir = "../templates_c";


$smarty->assign("session", $SESSION);

$smarty->assign("CITY_NAME", $CITY_NAME);
$smarty->assign("PHP_SELF", $PHP_SELF);
$smarty->assign("THIS_URL", $_SERVER['REQUEST_URI']);
$smarty->assign("BROWSER_IS_IE", preg_match("/MSIE/", $_SERVER['HTTP_USER_AGENT']) ? true : false);



?>