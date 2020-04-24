<?php /* Smarty version 2.6.9, created on 2006-04-17 11:41:59
         compiled from all_Entities.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<br clear="all">
<div class="page_title" id="page_title">
<em class="a">These Are</em> <em class="b">All The</em> <em class="c"><?php echo $this->_tpl_vars['all_entities']->type; ?>
s</em>
</div>
<ul class='connection'>
<?php $_from = $this->_tpl_vars['all_entities']->entities; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entity']):
?>
<li>
<?php if ($this->_tpl_vars['all_entities']->type == 'event'):  echo $this->_tpl_vars['entity']['start_date']; ?>
 -
<?php endif; ?>
<a href='entity.php?type=<?php echo $this->_tpl_vars['all_entities']->type; ?>
&id=<?php echo $this->_tpl_vars['entity']['ID']; ?>
'><?php echo $this->_tpl_vars['entity']['name']; ?>
</a></li>
<?php endforeach; endif; unset($_from); ?>
</ul>
</body>
</html>