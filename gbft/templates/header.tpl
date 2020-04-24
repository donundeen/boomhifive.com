<html>
<title>The {$entity->type} {$entity->info.name} at the {$CITY_NANE} Band Family 
Tree</title>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
{include file="ajax_header.tpl"}

<style type="text/css">@import url(jscalendar/calendar-win2k-1.css);</style>
<script type="text/javascript" src="jscalendar/calendar.js"></script>
<script type="text/javascript" src="jscalendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="jscalendar/calendar-setup.js"></script>

<script>
{literal}
function pageLoaded(){
	if (window.opener){
		window.opener.loadXML();
	}	
}

function urlencode(str) {
	return escape(str).replace(/[+]/g, '%2B');
}

String.prototype.urlencode = urlencode;

function openGraphWindow(){
	var url = urlencode(window.location);
	var location = "svg/graphpage.html?childtarget="+url;
	window.location = location;
}


var alternate_div_content = new Array();
var which_div_content = new Array();
function toggle_alternate_div_content(div_id){
	var content = document.getElementById(div_id).innerHTML;
	var which = which_div_content[div_id];
	if(which == 'original'){
		document.getElementById(div_id).innerHTML = alternate_div_content[div_id];
		which_div_content[div_id] = 'alternate';
	}else if(which == 'alternate'){
		document.getElementById(div_id).innerHTML = alternate_div_content[div_id];
		which_div_content[div_id] = 'original';
	}else{
		which_div_content[div_id] = 'original';
		alternate_div_content[div_id] = document.getElementById(div_id+ '_alternate').innerHTML;
		document.getElementById(div_id+ '_alternate').innerHTML = null;
	}
	alternate_div_content[div_id] = content;	
}

function hide_alternate_div_content(div_id){
	which_div_content[div_id] = 'original';
	alternate_div_content[div_id] = document.getElementById(div_id+ '_alternate').innerHTML;
	document.getElementById(div_id+ '_alternate').innerHTML = '';
}

{/literal}
</script>


{if $entity and $BROWSER_IS_IE}
{include file="entityxml.tpl"}
{/if}
{if $entity and !$BROWSER_IS_IE}
<link type='network_viz' href='entity_xml.php?type={$entity->type}&id={$entity->id}' />
{/if}

<!--include file="google_map_header.tpl"}-->

</head>
<body onload="liveSearchInit('band_searchform','entity2_name'); liveSearchInit('venue_searchform','entity2_name'); liveSearchInit('musician_searchform','entity2_name'); liveSearchInit('calendar_new_event_form', new Array('venue_name','band_name1')); {if $entity}
pageLoaded(); {/if}" onunload="GUnload()">

{if $entity and $BROWSER_IS_IE}
{literal}
<script>
if(!window.opener){
	document.write("<a href='javascript:openGraphWindow();'>Open Graph Window</a>");
}else{
//	alert("has opener");
}

</script>
{/literal}
{/if}

<center>
<div class="header">

<div class="header_left">
<div class="header_calendar_link">
<a href="calendar.php">Calendar</a>
</div>
<div class="header_paypal">
	<!--
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="donundeen@hotmail.com">
<input type="hidden" name="item_name" value="Gainesville Band Family Tree">
<input type="image" src="https://www.paypal.com/images/x-click-but04.gif" border
="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!"
>
</form>-->
</div>
</div>

<div class="header_center">
<div class="header_title">
<a href='./'>The {$CITY_NAME} Band Family Tree</a><BR>
<em class='x'>Under Re-construction, beware of technical issues</em>
</div>
<div class="header_search">
<form method=post action='search.php'>
Search: <input type=text size=20 name='search_string' value='{$search_string|escape:"html"}'>
<input type=submit name=submit value='go'>
</form>

</div>
</div>

<div class="header_right">
<div class="header_login">
{if $user->info.name}
You Are user <a href='entity.php?type=member&id={$user->info.ID}'>{$user->info.name}</a>
<BR>	
<a href="{$PHP_SELF}?type={$entity->type}&id={$entity->id}&action=logout_user">logout</a>
{else}
<form method=post action='{$PHP_SELF}'>
<input type=hidden name=action value='login_user'>
<input type=hidden name=type value='{$entity->type}'>
<input type=hidden name=id value='{$entity->id}'>
username:
<input type=text size=10 name='user_name'><Br>
password:
<input type=password size=10 name='user_pass'>
<input type=submit name=submit value=login>
</form>
<a href="new_user.php?return_page={$THIS_URL|escape:"url"}">Register</a>
{/if}
</div>
</div>

</div>
</center>
{foreach from=$ERROR_MSGS item=msg}
<font color=red>{$msg}</font><BR>
{/foreach}
