<?php /* Smarty version 2.6.9, created on 2006-04-17 10:45:32
         compiled from member_join_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'member_join_list.tpl', 4, false),)), $this); ?>
<ul class=connection>
<?php $_from = $this->_tpl_vars['entity']->join_info['member']['approved']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['info']):
?>
<li class=connection><a href="<?php echo $this->_tpl_vars['php_self']; ?>
?type=member&id=<?php echo $this->_tpl_vars['info']['member_ID']; ?>
"><?php echo $this->_tpl_vars['info']['name']; ?>
</a>
<i><?php echo ((is_array($_tmp=@$this->_tpl_vars['entity']->join_num_articles['member'][$this->_tpl_vars['id']])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
 articles</i> <i><?php echo ((is_array($_tmp=@$this->_tpl_vars['entity']->join_num_files['member'][$this->_tpl_vars['id']])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
 files</i></li>
<?php endforeach; endif; unset($_from); ?>
</ul>