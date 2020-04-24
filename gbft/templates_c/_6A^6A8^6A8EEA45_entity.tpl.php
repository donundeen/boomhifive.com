<?php /* Smarty version 2.6.9, created on 2006-12-05 19:12:48
         compiled from entity.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'entity.tpl', 33, false),array('modifier', 'date_format', 'entity.tpl', 68, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<br clear="all">
<div class="page_title" id="page_title">
<em class="a">this is the</em> <em class="b"><?php echo $this->_tpl_vars['entity']->type; ?>
</em> <em class="c"><?php echo $this->_tpl_vars['entity']->info['name']; ?>
</em>
<em class=x><a href="#" onclick="toggle_alternate_div_content('page_title');"><?php if ($this->_tpl_vars['entity']->type != 'member' || $this->_tpl_vars['user']->info['ID'] == $this->_tpl_vars['entity']->id): ?>(!)<?php endif; ?></a></em>
<?php $this->assign('tpl_name', ($this->_tpl_vars['entity']->type)."_additional_info.tpl");  if ($this->_tpl_vars['ALL_TEMPLATES'][$this->_tpl_vars['tpl_name']]):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['tpl_name'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif; ?>

</div>
<div id="page_title_alternate" class="edit_entity_info" >
<form method=post action='<?php echo $this->_tpl_vars['PHP_SELF']; ?>
'>
<em class="a">this is the</em> <em class="b"><?php echo $this->_tpl_vars['entity']->type; ?>
</em> <em class="c"><?php echo $this->_tpl_vars['entity']->info['name']; ?>
</em>
<BR>Oh, so you think this <?php echo $this->_tpl_vars['entity']->type; ?>
's info is wrong, do you?<BR> Submit your correction.
<?php if ($this->_tpl_vars['entity']->unapproved_entity_changes): ?>
<BR>
<i>
Current Pending corrections:<BR>
<?php $_from = $this->_tpl_vars['entity']->unapproved_entity_changes; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['unapproved_entity_changes'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['unapproved_entity_changes']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['entity_change']):
        $this->_foreach['unapproved_entity_changes']['iteration']++;
?>
<hr>
<?php $_from = $this->_tpl_vars['entity_change']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['column'] => $this->_tpl_vars['value']):
 if ($this->_tpl_vars['column'] != 'submitter_ip' && $this->_tpl_vars['column'] != 'submitter_member_ID' && $this->_tpl_vars['column'] != 'status' && $this->_tpl_vars['column'] != 'ID' && $this->_tpl_vars['column'] != 'orig_id' && $this->_tpl_vars['column'] != 'submit_date' && $this->_tpl_vars['column'] != 'submitter_email' && $this->_tpl_vars['column'] != 'submitter_name'):  echo $this->_tpl_vars['column']; ?>
 : <?php echo $this->_tpl_vars['value']; ?>
<BR>
<?php endif;  endforeach; endif; unset($_from);  endforeach; endif; unset($_from); ?>
</i>
<?php endif; ?>
<input type=hidden name='entity_type' value='<?php echo $this->_tpl_vars['entity']->type; ?>
'>
<input type=hidden name='type' value='<?php echo $this->_tpl_vars['entity']->type; ?>
'>
<input type=hidden name='entity_id' value='<?php echo $this->_tpl_vars['entity']->id; ?>
'>
<input type=hidden name='id' value='<?php echo $this->_tpl_vars['entity']->id; ?>
'>
<input type=hidden name='action' value='edit_entity'>
<BR>Correct Spelling of name: <input type=text name='entity_name' value='<?php echo ((is_array($_tmp=$this->_tpl_vars['entity']->info['name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
' size=20>
<BR>
<?php $this->assign('tpl_name', ($this->_tpl_vars['entity']->type)."_edit_entity_form.tpl");  if ($this->_tpl_vars['ALL_TEMPLATES'][$this->_tpl_vars['tpl_name']]):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['tpl_name'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif; ?>
<input type=submit name=submit value='submit correction'>
</form>
<em class=x><a href="#" onclick="toggle_alternate_div_content('page_title');">(close form)</a></em>
</div>

<script>hide_alternate_div_content('page_title');</script>


<div class="everything">

<div class="leftbar">


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['entity']->type)."_connections.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<div class="middle">

<div class="articles">
<h1>Articles:</h1>

<?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['entity']->articles) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['id']['show'] = true;
$this->_sections['id']['max'] = $this->_sections['id']['loop'];
$this->_sections['id']['step'] = 1;
$this->_sections['id']['start'] = $this->_sections['id']['step'] > 0 ? 0 : $this->_sections['id']['loop']-1;
if ($this->_sections['id']['show']) {
    $this->_sections['id']['total'] = $this->_sections['id']['loop'];
    if ($this->_sections['id']['total'] == 0)
        $this->_sections['id']['show'] = false;
} else
    $this->_sections['id']['total'] = 0;
if ($this->_sections['id']['show']):

            for ($this->_sections['id']['index'] = $this->_sections['id']['start'], $this->_sections['id']['iteration'] = 1;
                 $this->_sections['id']['iteration'] <= $this->_sections['id']['total'];
                 $this->_sections['id']['index'] += $this->_sections['id']['step'], $this->_sections['id']['iteration']++):
$this->_sections['id']['rownum'] = $this->_sections['id']['iteration'];
$this->_sections['id']['index_prev'] = $this->_sections['id']['index'] - $this->_sections['id']['step'];
$this->_sections['id']['index_next'] = $this->_sections['id']['index'] + $this->_sections['id']['step'];
$this->_sections['id']['first']      = ($this->_sections['id']['iteration'] == 1);
$this->_sections['id']['last']       = ($this->_sections['id']['iteration'] == $this->_sections['id']['total']);
?>
<div class="article">

<div class="article_header">
<div class="article_submitter">
<?php echo $this->_tpl_vars['entity']->articles[$this->_sections['id']['index']]['submitter_name']; ?>

</div>
<div class="article_submitter_email">
<?php echo $this->_tpl_vars['entity']->articles[$this->_sections['id']['index']]['submitter_email']; ?>

</div>
 <div class="article_submit_date">
 <?php echo ((is_array($_tmp=$this->_tpl_vars['entity']->articles[$this->_sections['id']['index']]['submit_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>

 </div>
</div>
<br clear="all"/>
 <div class="article_content">
<?php echo $this->_tpl_vars['entity']->articles[$this->_sections['id']['index']]['text']; ?>

 </div>
</div>
<?php endfor; endif; ?>
<hr>
<div class="article_form">
<div class="article_form_header">
<h1>Add Article:</h1>
</div>
<form method=post action='<?php echo $this->_tpl_vars['PHP_SELF']; ?>
'>
<input type=hidden name=action value='add_article'>
<input type='hidden' name=entity_type  value='<?php echo $this->_tpl_vars['entity']->type; ?>
'>
<input type='hidden' name=entity_id  value='<?php echo $this->_tpl_vars['entity']->id; ?>
'>
<div class="article_form_name">
Your Name:<input type=text name="submitter_name" size=20>
</div>
<BR>
<div class="article_form_email">
Your Email:<input type=text name="submitter_email" size=20>
</div>
<div class="article_form_text">
<textarea name='article_text' rows=10 cols=40></textarea>
<BR>
<input type=submit name=submit value=submit>
</div>
</form>

<?php if ($this->_tpl_vars['entity']->type == 'venue'): ?>

<div id="map" style="width: 500px; height: 300px"></div>
<?php if ($this->_tpl_vars['entity']->info['address'] != '' && ( ( $this->_tpl_vars['entity']->info['state'] != '' && $this->_tpl_vars['entity']->info['city'] != '' ) || $this->_tpl_vars['entity']->info['zip'] != '' )): ?>
<script type="text/javascript">
loadLocationAddress('<?php echo $this->_tpl_vars['entity']->info['address']; ?>
, <?php echo $this->_tpl_vars['entity']->info['city']; ?>
, <?php echo $this->_tpl_vars['entity']->info['state']; ?>
');
</script>
<?php else: ?>
<script type="text/javascript">
loadLocationAddress('<?php echo $this->_tpl_vars['CITY_NAME']; ?>
, <?php echo $this->_tpl_vars['STATE_NAME']; ?>
');
</script>

<?php endif;  endif; ?>
</div>



</div>
</div>



<div class="rightbar">
<?php if ($this->_tpl_vars['entity']->type == 'member' && $this->_tpl_vars['user']->info['name'] && $this->_tpl_vars['user']->info['ID'] == $this->_tpl_vars['entity']->id): ?>

<?php if ($this->_tpl_vars['user']->info['public_visible'] == 'y'): ?>
This page is visible to others. 
<a href='<?php echo $this->_tpl_vars['PHP_SELF']; ?>
?type=<?php echo $this->_tpl_vars['entity']->type; ?>
&id=<?php echo $this->_tpl_vars['entity']->id; ?>
&action=set_public_visible&public_visible=n'>Make this page Private</a>
<?php else: ?>
This page is hidden to others. 
<a href='<?php echo $this->_tpl_vars['PHP_SELF']; ?>
?type=<?php echo $this->_tpl_vars['entity']->type; ?>
&id=<?php echo $this->_tpl_vars['entity']->id; ?>
&action=set_public_visible&public_visible=y'>Make this page Public</a>
<?php endif; ?>

<?php endif; ?>


<?php if ($this->_tpl_vars['user']->info['name'] && ( $this->_tpl_vars['entity']->type != 'member' || $this->_tpl_vars['user']->info['ID'] != $this->_tpl_vars['entity']->id )): ?>

<!--
<?php if ($this->_tpl_vars['user_subscription_level'] == 'private'): ?>
You're subscribed to this <?php echo $this->_tpl_vars['entity']->type; ?>
's Public and Private Events<br>
Change Subscription level to 
<a href='<?php echo $this->_tpl_vars['PHP_SELF']; ?>
?type=<?php echo $this->_tpl_vars['entity']->type; ?>
&id=<?php echo $this->_tpl_vars['entity']->id; ?>
&user_id=<?php echo $this->_tpl_vars['user']->id; ?>
&action=subscribe_user&subscription_level=public'>Public</a>
<a href='<?php echo $this->_tpl_vars['PHP_SELF']; ?>
?type=<?php echo $this->_tpl_vars['entity']->type; ?>
&id=<?php echo $this->_tpl_vars['entity']->id; ?>
&user_id=<?php echo $this->_tpl_vars['user']->id; ?>
&action=unsubscribe_user'>Unsubscribe</a>
<?php endif; ?>
-->

<?php if ($this->_tpl_vars['user_subscription_level'] == 'public'): ?>
This <?php echo $this->_tpl_vars['entity']->type; ?>
 is in your watchlist<Br>
<!--Change subscription level to <a href='<?php echo $this->_tpl_vars['PHP_SELF']; ?>
?type=<?php echo $this->_tpl_vars['entity']->type; ?>
&id=<?php echo $this->_tpl_vars['entity']->id; ?>
&user_id=<?php echo $this->_tpl_vars['user']->id; ?>
&action=subscribe_user&subscription_level=private'>Private</a>-->
<a href='<?php echo $this->_tpl_vars['PHP_SELF']; ?>
?type=<?php echo $this->_tpl_vars['entity']->type; ?>
&id=<?php echo $this->_tpl_vars['entity']->id; ?>
&user_id=<?php echo $this->_tpl_vars['user']->id; ?>
&action=unsubscribe_user'>Remove from Watchlist</a>
<?php endif; ?>

<?php if ($this->_tpl_vars['user_subscription_level'] == ''): ?>
<a href='<?php echo $this->_tpl_vars['PHP_SELF']; ?>
?type=<?php echo $this->_tpl_vars['entity']->type; ?>
&id=<?php echo $this->_tpl_vars['entity']->id; ?>
&user_id=<?php echo $this->_tpl_vars['user']->id; ?>
&action=subscribe_user&subscription_level=public'>Add this <?php echo $this->_tpl_vars['entity']->type; ?>
 to my watchlist!</a><BR>
<!--
<?php if ($this->_tpl_vars['user_subscription_level'] != 'private'): ?>
<a href='<?php echo $this->_tpl_vars['PHP_SELF']; ?>
?type=<?php echo $this->_tpl_vars['entity']->type; ?>
&id=<?php echo $this->_tpl_vars['entity']->id; ?>
&user_id=<?php echo $this->_tpl_vars['user']->id; ?>
&action=subscribe_user&subscription_level=private'>Private</a>
<?php endif; ?>

<?php if ($this->_tpl_vars['user_subscription_level'] != 'public'): ?>
<a href='<?php echo $this->_tpl_vars['PHP_SELF']; ?>
?type=<?php echo $this->_tpl_vars['entity']->type; ?>
&id=<?php echo $this->_tpl_vars['entity']->id; ?>
&user_id=<?php echo $this->_tpl_vars['user']->id; ?>
&action=subscribe_user&subscription_level=public'>Public</a>
<?php endif; ?>
-->
<?php endif; ?>



<?php endif; ?>

<div class="file_list_name">Files</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file_list.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<BR>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'file_upload_form.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>




</div>


</body>
</html>