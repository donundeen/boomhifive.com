<?php


include_once(dirname(__FILE__)."/config.php");


include_once(dirname(__FILE__)."/classes/class.blocked_ip.php");


$result = blocked_ip::ip_blocked($_SERVER['REMOTE_ADDR']);


if($result){
	echo "This ip Address, ".$_SERVER['REMOTE_ADDR'].", is blocked for being a jerk, for some reason. If you've got a problem with that, send an email to unblockme@undeen.com";
	exit();
}else{
}




