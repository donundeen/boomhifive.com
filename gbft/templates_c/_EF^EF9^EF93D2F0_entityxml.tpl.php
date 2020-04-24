<?php /* Smarty version 2.6.9, created on 2007-12-06 21:00:19
         compiled from entityxml.tpl */ ?>
<?php echo '<?xml'; ?>
 version="1.0"<?php echo '?>'; ?>

<xml id="xmlDoc">
<allData>
<nodes>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "node_xml/".($this->_tpl_vars['entity']->type)."_node_xml.tpl", 'smarty_include_vars' => array('type' => $this->_tpl_vars['entity']->type,'name' => $this->_tpl_vars['entity']->info['name'],'id' => $this->_tpl_vars['entity']->id)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  $_from = $this->_tpl_vars['entity']->join_info; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['child_type'] => $this->_tpl_vars['joinlist']):
?>
	<?php $_from = $this->_tpl_vars['joinlist']['approved']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['child_id'] => $this->_tpl_vars['child_entity']):
?>
	<?php if ($this->_tpl_vars['child_type'] == 'band' || $this->_tpl_vars['child_type'] == 'musician'):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "node_xml/".($this->_tpl_vars['child_type'])."_node_xml.tpl", 'smarty_include_vars' => array('type' => $this->_tpl_vars['child_type'],'name' => $this->_tpl_vars['child_entity']['name'],'id' => $this->_tpl_vars['child_id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	
<?php endforeach; endif; unset($_from); ?>


</nodes>
<connections>
<?php $_from = $this->_tpl_vars['entity']->join_info; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['child_type'] => $this->_tpl_vars['joinlist']):
 if ($this->_tpl_vars['child_type'] == 'band' || $this->_tpl_vars['child_type'] == 'musician'): ?>
	<?php $_from = $this->_tpl_vars['joinlist']['approved']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['child_id'] => $this->_tpl_vars['child_entity']):
?>

<connection >
<?php if ($this->_tpl_vars['entity']->type > $this->_tpl_vars['child_type']): ?>
<line  id="<?php echo $this->_tpl_vars['child_type'];  echo $this->_tpl_vars['child_id']; ?>
_<?php echo $this->_tpl_vars['entity']->type;  echo $this->_tpl_vars['entity']->id; ?>
" x1="0" y1="0" x2="0" y2="0" stroke="black" stroke-width="black" fill="black" node1="<?php echo $this->_tpl_vars['child_type'];  echo $this->_tpl_vars['child_id']; ?>
"     node2="<?php echo $this->_tpl_vars['entity']->type;  echo $this->_tpl_vars['entity']->id; ?>
" />
<?php else: ?>
<line  id="<?php echo $this->_tpl_vars['entity']->type;  echo $this->_tpl_vars['entity']->id; ?>
_<?php echo $this->_tpl_vars['child_type'];  echo $this->_tpl_vars['child_id']; ?>
" x1="0" y1="0" x2="0" y2="0"  stroke="black" stroke-width="black" fill="black" node1="<?php echo $this->_tpl_vars['entity']->type;  echo $this->_tpl_vars['entity']->id; ?>
" node2="<?php echo $this->_tpl_vars['child_type'];  echo $this->_tpl_vars['child_id']; ?>
"/>
<?php endif; ?>
</connection>
	<?php endforeach; endif; unset($_from); ?>	
	<?php endif;  endforeach; endif; unset($_from); ?>
</connections>
</allData>
</xml>