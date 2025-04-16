<?php /* Smarty version 2.6.9, created on 2006-04-17 11:38:54
         compiled from band_connections.tpl */ ?>
<div class="entity_join_list">
<b class="entity_join_list_name">Band members:</b>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'musician_join_list.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<form name="musician_searchform" id="musician_searchform"   onsubmit="return liveSearchSubmit()" method=post action=<?php echo $this->_tpl_vars['PHP_SELF']; ?>
>
<input type=hidden name=action value="add_join">
<input type=hidden name=entity1_type value="<?php echo $this->_tpl_vars['entity']->type; ?>
">
<input type=hidden name=entity1_id value="<?php echo $this->_tpl_vars['entity']->id; ?>
">
<input type=hidden name=type value="<?php echo $this->_tpl_vars['entity']->type; ?>
">
<input type=hidden name=id value="<?php echo $this->_tpl_vars['entity']->id; ?>
">
<input type=hidden  name=entity2_type value="musician">
Add Band Member:
<input type=text class="livesearch" name="entity2_name" size=20  onkeypress="liveSearchStart('musician_searchform','entity2_name','musician','livesearch.php');" >
<div id="musician_searchform_entity2_name_LSResult" style="display: none;"><div id="musician_searchform_entity2_name_LSShadow"></div></div>



Instrument (years) :
<input type=text name=join_details size=20>
<input type=submit name=submit value=Add>
</form>




<hr>

<b class="entity_join_list_name">Upcoming Events!</b>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'event_join_list.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<form name="venue_searchform" id="venue_searchform"   onsubmit="return liveSearchSubmit()" method=post action=<?php echo $this->_tpl_vars['PHP_SELF']; ?>
>
<input type=hidden name=action value="add_event">
<input type=hidden name=entity1_type value="<?php echo $this->_tpl_vars['entity']->type; ?>
">
<input type=hidden name=entity1_id value="<?php echo $this->_tpl_vars['entity']->id; ?>
">
<input type=hidden name=band_id value="<?php echo $this->_tpl_vars['entity']->id; ?>
">
<input type=hidden name=type value="<?php echo $this->_tpl_vars['entity']->type; ?>
">
<input type=hidden name=id value="<?php echo $this->_tpl_vars['entity']->id; ?>
">
<input type=hidden  name=entity2_type value="venue">
Add Event:
<BR>
Name: <input type=text name=event_name size=20>
<BR>
Date: 
<input type=hidden id="start_date" name="start_date" size=10 />
<span id='show_date'>Click on Calendar:</span>
<img src="jscalendar/img.gif" id="trigger"
     style="cursor: pointer; border: 1px solid red;"
     title="Date selector"
     onmouseover="this.style.background='red';"
     onmouseout="this.style.background=''" />
<BR>
This Band starts at:
<BR>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pick_time_element.tpl", 'smarty_include_vars' => array('element_name' => 'details')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<BR>
At venue:
<input type=text class="livesearch" name="entity2_name" size=20  onkeypress="liveSearchStart('venue_searchform','entity2_name','venue','livesearch.php');" >
<div id="venue_searchform_entity2_name_LSResult" style="display: none;"><div id="venue_searchform_entity2_name_LSShadow"></div></div>

<?php if ($this->_tpl_vars['user_subscription_level'] == 'private'): ?>
<input type=radio name='event_type' value='public' CHECKED> - Public 
<input type=radio name='event_type' value='private' > - Private 
<?php else: ?>
<input type=hidden name='event_type' value='public'> 
<?php endif; ?>
<BR>

<input type=submit name=submit value=Add>
</form>
	
<script type="text/javascript">
<?php echo '
  Calendar.setup(
    {
      inputField  : "start_date",         // ID of the input field
      displayArea : "show_date",         
      ifFormat    : "%m/%d/%Y %I:%M %p",    // the date format
	  daFormat	  : "%m/%d/%Y %I:%M %p",
      button      : "trigger",       // ID of the button
      showsTime	  : "true",
      timeFormat  : "12"
    }
  );
'; ?>

  
</script>

<hr>

<b class="entity_join_list_name"><?php echo $this->_tpl_vars['entity']->info['name']; ?>
 has played at:</b>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'venue_join_list.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<hr>
<b class="entity_join_list_name"><?php echo $this->_tpl_vars['entity']->info['name']; ?>
 is being watched by:</b>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'member_join_list.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


</div>