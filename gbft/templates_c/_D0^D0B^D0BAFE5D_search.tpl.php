<?php /* Smarty version 2.6.9, created on 2006-04-17 10:45:38
         compiled from search.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<br>

<div class="search_results">
<em class='b'>Search Results</em><Br>
<hr>
<?php $_from = $this->_tpl_vars['search_results']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['table_name'] => $this->_tpl_vars['results']):
?>
<ul>
<em class='a'>Matching <?php echo $this->_tpl_vars['table_name']; ?>
s:</em>
<?php $_from = $this->_tpl_vars['results']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['result']):
?>
<li><a href='entity.php?type=<?php echo $this->_tpl_vars['table_name']; ?>
&id=<?php echo $this->_tpl_vars['result']['ID']; ?>
'><?php echo $this->_tpl_vars['result']['name']; ?>
</a></li>
<?php endforeach; else: ?>None
<?php endif; unset($_from); ?>
</ul>
<?php endforeach; endif; unset($_from); ?>
<hr>
<ul>
<em class='a'>Matching Articles</em><br>
<?php $_from = $this->_tpl_vars['article_search_results']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['table_name'] => $this->_tpl_vars['articles']):
 $_from = $this->_tpl_vars['articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
<li>The <?php echo $this->_tpl_vars['article']['entity_type']; ?>
 <a href='entity.php?type=<?php echo $this->_tpl_vars['table_name']; ?>
&id=<?php echo $this->_tpl_vars['article']['entity_ID']; ?>
'><?php echo $this->_tpl_vars['article']['entity_name']; ?>
</a></li>
<?php endforeach; endif; unset($_from);  endforeach; endif; unset($_from); ?>
</ul>
</div>