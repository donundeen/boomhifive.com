<?php /* Smarty version 2.6.9, created on 2007-12-06 21:01:08
         compiled from venue_edit_entity_form.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'venue_edit_entity_form.tpl', 1, false),)), $this); ?>
Address: <input type=text size=40 name=address value='<?php echo ((is_array($_tmp=$this->_tpl_vars['entity']->info['address'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
'><BR>
City: <input type=text size=20 name=city value='<?php echo ((is_array($_tmp=$this->_tpl_vars['entity']->info['city'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
'><BR>
State: <input type=text size=4 name=state value='<?php echo ((is_array($_tmp=$this->_tpl_vars['entity']->info['state'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
'><BR>