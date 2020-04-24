<?php /* Smarty version 2.6.9, created on 2006-12-06 15:22:33
         compiled from header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'header.tpl', 115, false),)), $this); ?>
<html>
<title>The <?php echo $this->_tpl_vars['entity']->type; ?>
 <?php echo $this->_tpl_vars['entity']->info['name']; ?>
 at the <?php echo $this->_tpl_vars['CITY_NANE']; ?>
 Band Family 
Tree</title>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "ajax_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<style type="text/css">@import url(jscalendar/calendar-win2k-1.css);</style>
<script type="text/javascript" src="jscalendar/calendar.js"></script>
<script type="text/javascript" src="jscalendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="jscalendar/calendar-setup.js"></script>

<script>
<?php echo '
function pageLoaded(){
	if (window.opener){
		window.opener.loadXML();
	}	
}

function urlencode(str) {
	return escape(str).replace(/[+]/g, \'%2B\');
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
	if(which == \'original\'){
		document.getElementById(div_id).innerHTML = alternate_div_content[div_id];
		which_div_content[div_id] = \'alternate\';
	}else if(which == \'alternate\'){
		document.getElementById(div_id).innerHTML = alternate_div_content[div_id];
		which_div_content[div_id] = \'original\';
	}else{
		which_div_content[div_id] = \'original\';
		alternate_div_content[div_id] = document.getElementById(div_id+ \'_alternate\').innerHTML;
		document.getElementById(div_id+ \'_alternate\').innerHTML = null;
	}
	alternate_div_content[div_id] = content;	
}

function hide_alternate_div_content(div_id){
	which_div_content[div_id] = \'original\';
	alternate_div_content[div_id] = document.getElementById(div_id+ \'_alternate\').innerHTML;
	document.getElementById(div_id+ \'_alternate\').innerHTML = \'\';
}

'; ?>

</script>


<?php if ($this->_tpl_vars['entity'] && $this->_tpl_vars['BROWSER_IS_IE']):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "entityxml.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif;  if ($this->_tpl_vars['entity'] && ! $this->_tpl_vars['BROWSER_IS_IE']): ?>
<link type='network_viz' href='entity_xml.php?type=<?php echo $this->_tpl_vars['entity']->type; ?>
&id=<?php echo $this->_tpl_vars['entity']->id; ?>
' />
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "google_map_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</head>
<body onload="loadMap(); liveSearchInit('band_searchform','entity2_name'); liveSearchInit('venue_searchform','entity2_name'); liveSearchInit('musician_searchform','entity2_name'); liveSearchInit('calendar_new_event_form', new Array('venue_name','band_name1')); <?php if ($this->_tpl_vars['entity']): ?>
pageLoaded(); <?php endif; ?>" onunload="GUnload()">

<?php if ($this->_tpl_vars['entity'] && $this->_tpl_vars['BROWSER_IS_IE']):  echo '
<script>
if(!window.opener){
	document.write("<a href=\'javascript:openGraphWindow();\'>Open Graph Window</a>");
}else{
//	alert("has opener");
}

</script>
'; ?>

<?php endif; ?>

<center>
<div class="header">

<div class="header_left">
<div class="header_calendar_link">
<a href="calendar.php">Calendar</a>
</div>
<div class="header_paypal">
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="donundeen@hotmail.com">
<input type="hidden" name="item_name" value="Gainesville Band Family Tree">
<input type="image" src="https://www.paypal.com/images/x-click-but04.gif" border
="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!"
>
</form>
</div>
</div>

<div class="header_center">
<div class="header_title">
<a href='./'>The <?php echo $this->_tpl_vars['CITY_NAME']; ?>
 Band Family Tree</a><BR>
<em class='x'>Under Re-construction, beware of technical issues</em>
</div>
<div class="header_search">
<form method=post action='search.php'>
Search: <input type=text size=20 name='search_string' value='<?php echo ((is_array($_tmp=$this->_tpl_vars['search_string'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
'>
<input type=submit name=submit value='go'>
</form>

</div>
</div>

<div class="header_right">
<div class="header_login">
<?php if ($this->_tpl_vars['user']->info['name']): ?>
You Are user <a href='entity.php?type=member&id=<?php echo $this->_tpl_vars['user']->info['ID']; ?>
'><?php echo $this->_tpl_vars['user']->info['name']; ?>
</a>
<BR>	
<a href="<?php echo $this->_tpl_vars['PHP_SELF']; ?>
?type=<?php echo $this->_tpl_vars['entity']->type; ?>
&id=<?php echo $this->_tpl_vars['entity']->id; ?>
&action=logout_user">logout</a>
<?php else: ?>
<form method=post action='<?php echo $this->_tpl_vars['PHP_SELF']; ?>
'>
<input type=hidden name=action value='login_user'>
<input type=hidden name=type value='<?php echo $this->_tpl_vars['entity']->type; ?>
'>
<input type=hidden name=id value='<?php echo $this->_tpl_vars['entity']->id; ?>
'>
username:
<input type=text size=10 name='user_name'><Br>
password:
<input type=password size=10 name='user_pass'>
<input type=submit name=submit value=login>
</form>
<a href="new_user.php?return_page=<?php echo ((is_array($_tmp=$this->_tpl_vars['THIS_URL'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
">Register</a>
<?php endif; ?>
</div>
</div>

</div>
</center>
<?php $_from = $this->_tpl_vars['ERROR_MSGS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['msg']):
?>
<font color=red><?php echo $this->_tpl_vars['msg']; ?>
</font><BR>
<?php endforeach; endif; unset($_from); ?>