<?php /* Smarty version 2.6.9, created on 2006-04-17 10:45:32
         compiled from venue_join_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'venue_join_list.tpl', 4, false),)), $this); ?>
<ul class=connection>
<?php $_from = $this->_tpl_vars['entity']->join_info['venue']['approved']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['info']):
?>
<li class=connection><a href="<?php echo $this->_tpl_vars['php_self']; ?>
?type=venue&id=<?php echo $this->_tpl_vars['info']['venue_ID']; ?>
"><?php echo $this->_tpl_vars['info']['name']; ?>
</a> <?php if ($this->_tpl_vars['entity']->type != 'member'): ?>(<?php echo $this->_tpl_vars['info']['details']; ?>
)<?php else: ?> <a href='<?php echo $this->_tpl_vars['PHP_SELF']; ?>
?id=<?php echo $this->_tpl_vars['entity']->id; ?>
&type=<?php echo $this->_tpl_vars['entity']->type; ?>
&action=delete_join&entity1_type=member&entity1_id=<?php echo $this->_tpl_vars['user']->info['ID']; ?>
&entity2_type=venue&entity2_id=<?php echo $this->_tpl_vars['info']['venue_ID']; ?>
'><em class='x'>Remove</em></a><?php endif; ?> 
<i><?php echo ((is_array($_tmp=@$this->_tpl_vars['entity']->join_num_articles['band'][$this->_tpl_vars['id']])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
 articles</i> <i><?php echo ((is_array($_tmp=@$this->_tpl_vars['entity']->join_num_files['band'][$this->_tpl_vars['id']])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
 files</i></li>
<?php endforeach; endif; unset($_from); ?>
</ul>
<ul class=connection>
<?php $_from = $this->_tpl_vars['entity']->join_info['venue']['new']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['info']):
?>
<li class=connection><i>new</i><a href="<?php echo $this->_tpl_vars['php_self']; ?>
?type=venue&id=<?php echo $this->_tpl_vars['info']['venue_ID']; ?>
"><?php echo $this->_tpl_vars['info']['name']; ?>
</a> <?php if ($this->_tpl_vars['entity']->type != 'member'): ?>(<?php echo $this->_tpl_vars['info']['details']; ?>
)<?php endif; ?>  <i><?php echo ((is_array($_tmp=@$this->_tpl_vars['entity']->join_num_articles['band'][$this->_tpl_vars['id']])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
 articles</i> <i><?php echo ((is_array($_tmp=@$this->_tpl_vars['entity']->join_num_files['band'][$this->_tpl_vars['id']])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
 files</i></li>
<?php endforeach; endif; unset($_from); ?>
</ul>