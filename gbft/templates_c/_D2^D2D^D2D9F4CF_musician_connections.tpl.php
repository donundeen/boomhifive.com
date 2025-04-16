<?php /* Smarty version 2.6.9, created on 2006-04-17 10:45:31
         compiled from musician_connections.tpl */ ?>
<div class="entity_join_list">
<b class="entity_join_list_name">Has Played in the Bands:</b>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'band_join_list.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<form name="band_searchform" id="band_searchform"   onsubmit="return liveSearchSubmit()" method=post action=<?php echo $this->_tpl_vars['PHP_SELF']; ?>
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
Add Band:
<input type=text class="livesearch" name="entity2_name" size=20  onkeypress="liveSearchStart('band_searchform','entity2_name','band','livesearch.php');" >
<input type=hidden  name=entity2_type value="band">
<div id="band_searchform_entity2_name_LSResult" style="display: none;"><div id="band_searchform_entity2_name_LSShadow"></div></div>
Instrument (years) :
<input type=text name=join_details size=20>
<input type=submit name=submit value=Add>
</form>
<hr>
<b class="entity_join_list_name"><?php echo $this->_tpl_vars['entity']->info['name']; ?>
 has worked at:</b>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'venue_join_list.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<form name="venue_searchform" id="venue_searchform"   onsubmit="return liveSearchSubmit()" method=post action=<?php echo $this->_tpl_vars['PHP_SELF']; ?>
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
Add Venue:
<input type=text class="livesearch" name="entity2_name" size=20  onkeypress="liveSearchStart('venue_searchform','entity2_name','venue','livesearch.php');" >
<input type=hidden  name=entity2_type value="venue">
<div id="venue_searchform_entity2_name_LSResult" style="display: none;"><div id="venue_searchform_entity2_name_LSShadow"></div></div>
<input type=submit name=submit value=Add>
</form>

<hr>

<b class="entity_join_list_name">Upcoming Events!</b>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'event_join_list.tpl', 'smarty_include_vars' => array()));
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