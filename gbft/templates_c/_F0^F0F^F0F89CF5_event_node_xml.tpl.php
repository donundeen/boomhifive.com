<?php /* Smarty version 2.6.9, created on 2007-12-03 22:32:34
         compiled from node_xml/event_node_xml.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'node_xml/event_node_xml.tpl', 4, false),)), $this); ?>
<node>
	<g id="<?php echo $this->_tpl_vars['type'];  echo $this->_tpl_vars['id']; ?>
" linkref="http://<?php echo $this->_tpl_vars['HOST'];  echo $this->_tpl_vars['THIS_DIR']; ?>
/entity.php?type=<?php echo $this->_tpl_vars['type']; ?>
&amp;id=<?php echo $this->_tpl_vars['id']; ?>
">
	<circle  cx="0" cy="0" r="3" fill="green"  draggable="true"/>
	<text x="0" y="0"  draggable="true" fill="green"><?php echo ((is_array($_tmp=$this->_tpl_vars['name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
<set attributeName="font-size" from="12" to="18" 
         begin="mouseover" end="mouseout"/></text>
	</g>
</node>