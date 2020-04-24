<?
include_once('../classes/class.cross_link_articles.php');

$crosslink = new cross_link_articles();

$crosslink->process();

echo "done";

?>