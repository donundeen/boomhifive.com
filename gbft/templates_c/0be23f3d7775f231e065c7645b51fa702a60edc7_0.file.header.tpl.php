<?php
/* Smarty version 3.1.34-dev-7, created on 2025-04-13 22:18:56
  from '/Users/donundeen/Documents/htdocs/boomhifive.com/gbft/templates/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_67fc3850b591c9_00887301',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0be23f3d7775f231e065c7645b51fa702a60edc7' => 
    array (
      0 => '/Users/donundeen/Documents/htdocs/boomhifive.com/gbft/templates/header.tpl',
      1 => 1637360197,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:ajax_header.tpl' => 1,
    'file:entityxml.tpl' => 1,
  ),
),false)) {
function content_67fc3850b591c9_00887301 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<title>The <?php echo $_smarty_tpl->tpl_vars['entity']->value->type;?>
 <?php echo $_smarty_tpl->tpl_vars['entity']->value->info['name'];?>
 at the <?php echo $_smarty_tpl->tpl_vars['CITY_NANE']->value;?>
 Band Family 
Tree</title>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<?php $_smarty_tpl->_subTemplateRender("file:ajax_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style type="text/css">@import url(jscalendar/calendar-win2k-1.css);</style>
<?php echo '<script'; ?>
 type="text/javascript" src="jscalendar/calendar.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="jscalendar/lang/calendar-en.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="jscalendar/calendar-setup.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>

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


<?php echo '</script'; ?>
>


<?php if ($_smarty_tpl->tpl_vars['entity']->value && $_smarty_tpl->tpl_vars['BROWSER_IS_IE']->value) {
$_smarty_tpl->_subTemplateRender("file:entityxml.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
if ($_smarty_tpl->tpl_vars['entity']->value && !$_smarty_tpl->tpl_vars['BROWSER_IS_IE']->value) {?>
<link type='network_viz' href='entity_xml.php?type=<?php echo $_smarty_tpl->tpl_vars['entity']->value->type;?>
&id=<?php echo $_smarty_tpl->tpl_vars['entity']->value->id;?>
' />
<?php }?>

<!--include file="google_map_header.tpl"}-->

</head>
<body onload="liveSearchInit('band_searchform','entity2_name'); liveSearchInit('venue_searchform','entity2_name'); liveSearchInit('musician_searchform','entity2_name'); liveSearchInit('calendar_new_event_form', new Array('venue_name','band_name1')); <?php if ($_smarty_tpl->tpl_vars['entity']->value) {?>
pageLoaded(); <?php }?>" onunload="GUnload()">

<?php if ($_smarty_tpl->tpl_vars['entity']->value && $_smarty_tpl->tpl_vars['BROWSER_IS_IE']->value) {?>

<?php echo '<script'; ?>
>
if(!window.opener){
	document.write("<a href='javascript:openGraphWindow();'>Open Graph Window</a>");
}else{
//	alert("has opener");
}

<?php echo '</script'; ?>
>

<?php }?>

<center>
<div class="header">

<div class="header_left">
<div class="header_calendar_link hideable">
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
<a href='./'>The <?php echo $_smarty_tpl->tpl_vars['CITY_NAME']->value;?>
 Band Family Tree</a><BR>
<em class='x'>Under Re-construction, beware of technical issues</em>
</div>
<div class="header_search">
<form method=post action='search.php'>
Search: <input type=text size=20 name='search_string' value='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['search_string']->value, ENT_QUOTES, 'UTF-8', true);?>
'>
<input type=submit name=submit value='go'>
</form>

</div>
</div>

<div class="header_right">
<div class="header_login hideable">
<?php if ($_smarty_tpl->tpl_vars['user']->value->info['name']) {?>
You Are user <a href='entity.php?type=member&id=<?php echo $_smarty_tpl->tpl_vars['user']->value->info['ID'];?>
'><?php echo $_smarty_tpl->tpl_vars['user']->value->info['name'];?>
</a>
<BR>	
<a href="<?php echo $_smarty_tpl->tpl_vars['PHP_SELF']->value;?>
?type=<?php echo $_smarty_tpl->tpl_vars['entity']->value->type;?>
&id=<?php echo $_smarty_tpl->tpl_vars['entity']->value->id;?>
&action=logout_user">logout</a>
<?php } else { ?>
<form method=post action='<?php echo $_smarty_tpl->tpl_vars['PHP_SELF']->value;?>
' class="hideable">
<input type=hidden name=action value='login_user'>
<input type=hidden name=type value='<?php echo $_smarty_tpl->tpl_vars['entity']->value->type;?>
'>
<input type=hidden name=id value='<?php echo $_smarty_tpl->tpl_vars['entity']->value->id;?>
'>
username:
<input type=text size=10 name='user_name'><Br>
password:
<input type=password size=10 name='user_pass'>
<input type=submit name=submit value=login>
</form>
<a href="new_user.php?return_page=<?php echo rawurlencode($_smarty_tpl->tpl_vars['THIS_URL']->value);?>
">Register</a>
<?php }?>
</div>
</div>

</div>
</center>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ERROR_MSGS']->value, 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
<font color=red><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</font><BR>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
