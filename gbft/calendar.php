<?php

include_once("setup.php");
include_once("classes/class.calendar.php");

$calendar = new calendar();

if(is_object($SESSION->user)){
	$calendar->set_user($SESSION->user);
	$calendar->set_user_events_only($SESSION->vars['user_events_only']);
}


$calendar->set_date($input->vars['calendar_year'], $input->vars['calendar_month']);

$smarty->assign("weeks", $calendar->weeks);

$date = $calendar->year."/". $calendar->month."/01";

$date_ts = strtotime($date);



$smarty->assign("date_header_text", date("F, Y", $date_ts));
$smarty->assign("next_year", $calendar->next_year);
$smarty->assign("next_month", $calendar->next_month);
$smarty->assign("calendar_year", $calendar->year);
$smarty->assign("calendar_month", $calendar->month);
$smarty->assign("prev_year", $calendar->prev_year);
$smarty->assign("prev_month", $calendar->prev_month);
$smarty->assign("user_events_only", $SESSION->vars['user_events_only']);

$smarty->display("calendar.tpl");
