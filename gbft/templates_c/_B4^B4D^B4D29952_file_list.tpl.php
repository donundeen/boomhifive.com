<?php /* Smarty version 2.6.9, created on 2006-04-17 11:13:51
         compiled from file_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'string_format', 'file_list.tpl', 7, false),)), $this); ?>
<?php $_from = $this->_tpl_vars['entity']->thumbnailed_images; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['image_key'] => $this->_tpl_vars['image']):
?>
<a href="submitted_files/<?php echo $this->_tpl_vars['entity']->type; ?>
/<?php echo $this->_tpl_vars['entity']->id; ?>
/<?php echo $this->_tpl_vars['image']['filename']; ?>
"><img src="submitted_files/<?php echo $this->_tpl_vars['entity']->type; ?>
/<?php echo $this->_tpl_vars['entity']->id; ?>
/<?php echo $this->_tpl_vars['image']['filename']; ?>
" width=150><BR><?php echo $this->_tpl_vars['image']['filename']; ?>
</a> - <?php echo $this->_tpl_vars['image']['description']; ?>

<BR>
<?php endforeach; endif; unset($_from); ?>
<ul class=file>
<?php $_from = $this->_tpl_vars['entity']->files; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['file_key'] => $this->_tpl_vars['file']):
?>
<li class=file><a href="submitted_files/<?php echo $this->_tpl_vars['entity']->type; ?>
/<?php echo $this->_tpl_vars['entity']->id; ?>
/<?php echo $this->_tpl_vars['file']['filename']; ?>
"><?php echo $this->_tpl_vars['file']['filename']; ?>
</a><?php echo $this->_tpl_vars['file']['description']; ?>
 (<?php echo ((is_array($_tmp=$this->_tpl_vars['file']['filesize']/1000)) ? $this->_run_mod_handler('string_format', true, $_tmp, "%d") : smarty_modifier_string_format($_tmp, "%d")); ?>
 Kb)</li>
<?php endforeach; endif; unset($_from); ?>
</ul>