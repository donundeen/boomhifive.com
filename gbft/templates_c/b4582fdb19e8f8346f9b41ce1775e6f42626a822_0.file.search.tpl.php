<?php
/* Smarty version 3.1.34-dev-7, created on 2025-04-13 22:30:06
  from '/Users/donundeen/Documents/htdocs/boomhifive.com/gbft/templates/search.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_67fc3aeedd8c48_53912420',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b4582fdb19e8f8346f9b41ce1775e6f42626a822' => 
    array (
      0 => '/Users/donundeen/Documents/htdocs/boomhifive.com/gbft/templates/search.tpl',
      1 => 1637360197,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_67fc3aeedd8c48_53912420 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<br>

<div class="search_results">
<em class='b'>Search Results</em><Br>
<hr>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['search_results']->value, 'results', false, 'table_name');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['table_name']->value => $_smarty_tpl->tpl_vars['results']->value) {
?>
<ul>
<em class='a'>Matching <?php echo $_smarty_tpl->tpl_vars['table_name']->value;?>
s:</em>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['results']->value, 'result', false, 'id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['result']->value) {
?>
<li><a href='entity.php?type=<?php echo $_smarty_tpl->tpl_vars['table_name']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['result']->value['ID'];?>
'><?php echo $_smarty_tpl->tpl_vars['result']->value['name'];?>
</a></li>
<?php
}
} else {
?>None
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
<hr>
<ul>
<em class='a'>Matching Articles</em><br>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['article_search_results']->value, 'articles', false, 'table_name');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['table_name']->value => $_smarty_tpl->tpl_vars['articles']->value) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articles']->value, 'article');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
?>
<li>The <?php echo $_smarty_tpl->tpl_vars['article']->value['entity_type'];?>
 <a href='entity.php?type=<?php echo $_smarty_tpl->tpl_vars['table_name']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['article']->value['entity_ID'];?>
'><?php echo $_smarty_tpl->tpl_vars['article']->value['entity_name'];?>
</a></li>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul>
</div><?php }
}
