<?
include_once("setup.php");


include_once("../classes/class.blocked_ip.php");

$blocked_ip = new blocked_ip();
$blocked_ip->process();

$smarty = $blocked_ip->process_tpl($smarty);

$smarty->display("blocked_ips.tpl");

?>