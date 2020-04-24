<?php /* Smarty version 2.6.9, created on 2006-04-17 11:38:54
         compiled from musician_join_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'musician_join_list.tpl', 4, false),array('modifier', 'default', 'musician_join_list.tpl', 5, false),)), $this); ?>
<ul class=connection>
<?php $_from = $this->_tpl_vars['entity']->join_info['musician']['approved']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['info']):
?>
<li class=connection><a href="<?php echo $this->_tpl_vars['php_self']; ?>
?type=musician&id=<?php echo $this->_tpl_vars['info']['musician_ID']; ?>
"><?php echo $this->_tpl_vars['info']['name']; ?>
</a> 
<?php if ($this->_tpl_vars['entity']->type != 'member'): ?>(<?php if ($this->_tpl_vars['entity']->type == 'event'):  echo ((is_array($_tmp=$this->_tpl_vars['info']['details'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%I:%M %p") : smarty_modifier_date_format($_tmp, "%I:%M %p"));  else:  echo $this->_tpl_vars['info']['details'];  endif; ?>)<a href=# onclick="toggle_alternate_div_content('<?php echo $this->_tpl_vars['entity']->type; ?>
_musician_<?php echo $this->_tpl_vars['info']['ID']; ?>
');"><em class="x">(!)</em></a><?php else: ?> <a href='<?php echo $this->_tpl_vars['PHP_SELF']; ?>
?id=<?php echo $this->_tpl_vars['entity']->id; ?>
&type=<?php echo $this->_tpl_vars['entity']->type; ?>
&action=delete_join&entity1_type=member&entity1_id=<?php echo $this->_tpl_vars['user']->info['ID']; ?>
&entity2_type=musician&entity2_id=<?php echo $this->_tpl_vars['info']['musician_ID']; ?>
'><em class='x'>Remove</em></a><?php endif; ?>
 <i><?php echo ((is_array($_tmp=@$this->_tpl_vars['entity']->join_num_articles['musician'][$this->_tpl_vars['id']])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
 articles</i> <i><?php echo ((is_array($_tmp=@$this->_tpl_vars['entity']->join_num_files['musician'][$this->_tpl_vars['id']])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
 files</i></li>
<div id='<?php echo $this->_tpl_vars['entity']->type; ?>
_musician_<?php echo $this->_tpl_vars['info']['ID']; ?>
'></div>
<div id='<?php echo $this->_tpl_vars['entity']->type; ?>
_musician_<?php echo $this->_tpl_vars['info']['ID']; ?>
_alternate'><em class='z'>Correct These Details:</em>
<form method=post action=<?php echo $this->_tpl_vars['PHP_SELF']; ?>
>
<input type=hidden name=action value='edit_join'>
<input type=hidden name=type value='<?php echo $this->_tpl_vars['entity']->type; ?>
'>
<input type=hidden name=id value='<?php echo $this->_tpl_vars['entity']->id; ?>
'>
<input type=hidden name=entity1_type value='<?php echo $this->_tpl_vars['entity']->type; ?>
'>
<input type=hidden name=entity2_type value='musician'>
<input type=hidden name='<?php echo $this->_tpl_vars['entity']->type; ?>
_ID' value='<?php echo $this->_tpl_vars['entity']->id; ?>
'>
<input type=hidden name='musician_ID' value='<?php echo $this->_tpl_vars['info']['musician_ID']; ?>
'>

<input type=hidden name=join_id value='<?php echo $this->_tpl_vars['info']['ID']; ?>
'>
<input type=text name=join_details value='<?php echo $this->_tpl_vars['info']['details']; ?>
'>
<BR>
<input type=submit name=submit value=submit>
<?php if ($this->_tpl_vars['info']['changes']): ?>
<BR><em class='y'>recent unapproved changes:<BR>
<?php $_from = $this->_tpl_vars['info']['changes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['change']):
?>
 - <?php echo $this->_tpl_vars['change']['details']; ?>
<BR>
<?php endforeach; endif; unset($_from); ?>
</em>
<?php endif; ?>
</form>
</div>
<script>hide_alternate_div_content('<?php echo $this->_tpl_vars['entity']->type; ?>
_musician_<?php echo $this->_tpl_vars['info']['ID']; ?>
');</script>

<?php endforeach; endif; unset($_from); ?>
</ul>
<ul class=connection>
<?php $_from = $this->_tpl_vars['entity']->join_info['musician']['new']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['info']):
?>
<li class=connection><i>new!</i><a href="<?php echo $this->_tpl_vars['php_self']; ?>
?type=musician&id=<?php echo $this->_tpl_vars['info']['musician_ID']; ?>
"><?php echo $this->_tpl_vars['info']['name']; ?>
</a> <?php if ($this->_tpl_vars['entity']->type != 'member'): ?>(<?php if ($this->_tpl_vars['entity']->type == 'event'):  echo ((is_array($_tmp=$this->_tpl_vars['info']['details'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%I:%M %p") : smarty_modifier_date_format($_tmp, "%I:%M %p"));  else:  echo $this->_tpl_vars['info']['details'];  endif; ?>) <?php endif; ?><i><?php echo ((is_array($_tmp=@$this->_tpl_vars['entity']->join_num_articles['musician'][$this->_tpl_vars['id']])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
 articles</i> <i><?php echo ((is_array($_tmp=@$this->_tpl_vars['entity']->join_num_files['musician'][$this->_tpl_vars['id']])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
 files</i></li>
<?php endforeach; endif; unset($_from); ?>
</ul>