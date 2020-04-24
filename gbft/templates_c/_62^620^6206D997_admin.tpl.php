<?php /* Smarty version 2.6.9, created on 2006-04-26 18:49:29
         compiled from admin.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin.tpl', 242, false),)), $this); ?>
<form method=post action='<?php echo $this->_tpl_vars['PHP_SELF']; ?>
'>


<table border=1>
<tr>
<TD colspan=5>
New Entities: <input type=checkbox name='confirm_all' value=true> - Confirm All Except as Noted
<input type=submit name=submit value=submit>

</td>
</tr>
<tr>
<td>Type</td>
<td>Name</td>
<td>Info</td>
<td>Confirm</td>
<td>Delete</td>
<td>Bypass</td>
</tr>


<?php $_from = $this->_tpl_vars['new_entities']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['type'] => $this->_tpl_vars['entities']):
 $_from = $this->_tpl_vars['entities']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['new_entities'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['new_entities']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['entity']):
        $this->_foreach['new_entities']['iteration']++;
?>

<input type=hidden name="new_entities[<?php echo $this->_tpl_vars['type']; ?>
][<?php echo $this->_foreach['new_entities']['iteration']; ?>
][ID]" value="<?php echo $this->_tpl_vars['entity']['ID']; ?>
">
<input type=hidden name="new_entities[<?php echo $this->_tpl_vars['type']; ?>
][<?php echo $this->_foreach['new_entities']['iteration']; ?>
][type]" value="<?php echo $this->_tpl_vars['type']; ?>
">
<tr>
<td><?php echo $this->_tpl_vars['type']; ?>
</td>
<td><?php echo $this->_tpl_vars['entity']['name']; ?>
</td>
<td><?php $_from = $this->_tpl_vars['entity']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['col'] => $this->_tpl_vars['value']):
 echo $this->_tpl_vars['col']; ?>
:<?php echo $this->_tpl_vars['value']; ?>
<BR>
<?php endforeach; endif; unset($_from); ?>
</td>
<td><input type=radio name="new_entities[<?php echo $this->_tpl_vars['type']; ?>
][<?php echo $this->_foreach['new_entities']['iteration']; ?>
][action]" value="confirm"> - Confirm</td>
<td><input type=radio name="new_entities[<?php echo $this->_tpl_vars['type']; ?>
][<?php echo $this->_foreach['new_entities']['iteration']; ?>
][action]" value="delete"> - Delete</td>
<td><input type=radio name="new_entities[<?php echo $this->_tpl_vars['type']; ?>
][<?php echo $this->_foreach['new_entities']['iteration']; ?>
][action]" value="bypass"> - Bypass</td>
</tr>
<?php endforeach; endif; unset($_from);  endforeach; endif; unset($_from); ?>
<tr>
<Td colspan=6>
<input type=submit name=submit value=submit>
</form>
</td>
</tr>
</table>


<BR>



<form method=post action=<?php echo $this->_tpl_vars['PHP_SELF']; ?>
>
<table  border=1>
<tr>
<TD colspan=6>
Changed Entities: <input type=checkbox name='confirm_all' value=true> - Confirm All Except as Noted
</td>
</tr>
<tr>
<td>Type</td>
<td>Name</td>
<td>Info</td>
<Td>Previous Name</td>
<td>Previous Info</td>
<td>Confirm</td>
<td>Delete</td>
<td>Bypass</td>
</tr>
<?php $_from = $this->_tpl_vars['change_entities']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['type'] => $this->_tpl_vars['entities']):
 $_from = $this->_tpl_vars['entities']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['change_entities'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['change_entities']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['entity']):
        $this->_foreach['change_entities']['iteration']++;
?>
<input type=hidden name="change_entities[<?php echo $this->_tpl_vars['type']; ?>
][<?php echo $this->_foreach['change_entities']['iteration']; ?>
][ID]" value="<?php echo $this->_tpl_vars['entity']['ID']; ?>
">
<input type=hidden name="change_entities[<?php echo $this->_tpl_vars['type']; ?>
][<?php echo $this->_foreach['change_entities']['iteration']; ?>
][type]" value="<?php echo $this->_tpl_vars['type']; ?>
">
<tr>
<td><?php echo $this->_tpl_vars['type']; ?>
</td>
<td><?php echo $this->_tpl_vars['entity']['name']; ?>
</td>
<td><?php $_from = $this->_tpl_vars['entity']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['col'] => $this->_tpl_vars['value']):
 echo $this->_tpl_vars['col']; ?>
:<?php echo $this->_tpl_vars['value']; ?>
<BR>
<?php endforeach; endif; unset($_from); ?>
</td>

<Td><?php echo $this->_tpl_vars['entity']['orig_row']['name']; ?>
</td>
<td><?php $_from = $this->_tpl_vars['entity']['orig_row']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['col'] => $this->_tpl_vars['value']):
 echo $this->_tpl_vars['col']; ?>
:<?php echo $this->_tpl_vars['value']; ?>
<BR>
<?php endforeach; endif; unset($_from); ?>
</td>
<td><input type=radio name="change_entities[<?php echo $this->_tpl_vars['type']; ?>
][<?php echo $this->_foreach['change_entities']['iteration']; ?>
][action]" value="confirm"> - Confirm</td>
<td><input type=radio name="change_entities[<?php echo $this->_tpl_vars['type']; ?>
][<?php echo $this->_foreach['change_entities']['iteration']; ?>
][action]" value="delete"> - Delete</td>
<td><input type=radio name="change_entities[<?php echo $this->_tpl_vars['type']; ?>
][<?php echo $this->_foreach['change_entities']['iteration']; ?>
][action]" value="bypass"> - Bypass</td>
</tr>
<?php endforeach; endif; unset($_from);  endforeach; endif; unset($_from); ?>

<tr>
<Td colspan=6>
<input type=submit name=submit value=submit>
</form>
</td>
</tr>
</table>



<BR>




<form method=post action=<?php echo $this->_tpl_vars['PHP_SELF']; ?>
>
<table border=1>
<tr>
<td colspan=8>
New Joins: <input type=checkbox name='confirm_all' value=true> - Confirm All Except as Noted
<input type=submit name=submit value=submit>

</td>
</tr>
<tr>
<td>Entity 1 Type</td>
<td>Entity 1 Name</td>
<td>Entity 2 Type</td>
<td>Entity 2 Name</td>
<td>Details</td>
<td>All Info</td>
<td>Confirm</td>
<td>Bypass</td>
<td>Delete</td>
</tr>
<?php $_from = $this->_tpl_vars['new_joins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['table_name'] => $this->_tpl_vars['joins']):
 $_from = $this->_tpl_vars['joins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['new_joins'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['new_joins']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['join']):
        $this->_foreach['new_joins']['iteration']++;
?>

<input type=hidden name="new_joins[<?php echo $this->_tpl_vars['table_name']; ?>
][<?php echo $this->_foreach['new_joins']['iteration']; ?>
][ID]" value="<?php echo $this->_tpl_vars['join']['ID']; ?>
">
<input type=hidden name="new_joins[<?php echo $this->_tpl_vars['table_name']; ?>
][<?php echo $this->_foreach['new_joins']['iteration']; ?>
][table_name]" value="<?php echo $this->_tpl_vars['table_name']; ?>
">
<tr>
<td><?php echo $this->_tpl_vars['join']['entity_1_type']; ?>
</td>
<td><?php echo $this->_tpl_vars['join']['entity_1_name']; ?>
</td>
<td><?php echo $this->_tpl_vars['join']['entity_2_type']; ?>
</td>
<td><?php echo $this->_tpl_vars['join']['entity_2_name']; ?>
</td>
<td><?php echo $this->_tpl_vars['join']['details']; ?>
</td>
<td><?php $_from = $this->_tpl_vars['join']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['col'] => $this->_tpl_vars['value']):
 echo $this->_tpl_vars['col']; ?>
:<?php echo $this->_tpl_vars['value']; ?>
<Br>
<?php endforeach; endif; unset($_from); ?>
</td>
<td><input type=radio name="new_joins[<?php echo $this->_tpl_vars['table_name']; ?>
][<?php echo $this->_foreach['new_joins']['iteration']; ?>
][action]" value="confirm"> - Confirm</td>
<td><input type=radio name="new_joins[<?php echo $this->_tpl_vars['table_name']; ?>
][<?php echo $this->_foreach['new_joins']['iteration']; ?>
][action]" value="delete"> - Delete</td>
<td><input type=radio name="new_joins[<?php echo $this->_tpl_vars['table_name']; ?>
][<?php echo $this->_foreach['new_joins']['iteration']; ?>
][action]" value="bypass"> - Bypass</td>
</tr>

<?php endforeach; endif; unset($_from);  endforeach; endif; unset($_from); ?>
<tr>
<Td colspan=8>
<input type=submit name=submit value=submit>
</td>
</tr>
</table>

</form>





<BR>



<form method=post action=<?php echo $this->_tpl_vars['PHP_SELF']; ?>
>

<table border=1>
<tr>
<td colspan=9>
Changed Joins: <input type=checkbox name='confirm_all' value=true> - Confirm All Except as Noted
<input type=submit name=submit value=submit>

</td>
</tr>
<tr>
<td>Entity 1 Type</td>
<td>Entity 1 Name</td>
<td>Entity 2 Type</td>
<td>Entity 2 Name</td>
<td>Previous Details</td>
<td>New Details</td>
<td>Confirm</td>
<td>Bypass</td>
<td>Delete</td>
</tr>

<?php $_from = $this->_tpl_vars['change_joins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['table_name'] => $this->_tpl_vars['joins']):
 $_from = $this->_tpl_vars['joins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['change_joins'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['change_joins']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['join']):
        $this->_foreach['change_joins']['iteration']++;
?>
<input type=hidden name="change_joins[<?php echo $this->_tpl_vars['table_name']; ?>
][<?php echo $this->_foreach['change_joins']['iteration']; ?>
][ID]" value="<?php echo $this->_tpl_vars['join']['ID']; ?>
">
<input type=hidden name="change_joins[<?php echo $this->_tpl_vars['table_name']; ?>
][<?php echo $this->_foreach['change_joins']['iteration']; ?>
][table_name]" value="<?php echo $this->_tpl_vars['table_name']; ?>
">
<tr>
<td><?php echo $this->_tpl_vars['join']['entity_1_type']; ?>
</td>
<td><?php echo $this->_tpl_vars['join']['entity_1_name']; ?>
</td>
<td><?php echo $this->_tpl_vars['join']['entity_2_type']; ?>
</td>
<td><?php echo $this->_tpl_vars['join']['entity_2_name']; ?>
</td>
<td><?php $_from = $this->_tpl_vars['join']['orig_row']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['col'] => $this->_tpl_vars['value']):
 echo $this->_tpl_vars['col']; ?>
:<?php echo $this->_tpl_vars['value']; ?>
<BR>
<?php endforeach; endif; unset($_from); ?>
</td>
<td><?php $_from = $this->_tpl_vars['join']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['col'] => $this->_tpl_vars['value']):
 echo $this->_tpl_vars['col']; ?>
:<?php echo $this->_tpl_vars['value']; ?>
<BR>
<?php endforeach; endif; unset($_from); ?>
</td>
<td><input type=radio name="change_joins[<?php echo $this->_tpl_vars['table_name']; ?>
][<?php echo $this->_foreach['change_joins']['iteration']; ?>
][action]" value="confirm"> - Confirm</td>
<td><input type=radio name="change_joins[<?php echo $this->_tpl_vars['table_name']; ?>
][<?php echo $this->_foreach['change_joins']['iteration']; ?>
][action]" value="delete"> - Delete</td>
<td><input type=radio name="change_joins[<?php echo $this->_tpl_vars['table_name']; ?>
][<?php echo $this->_foreach['change_joins']['iteration']; ?>
][action]" value="bypass"> - Bypass</td>
</tr>

<?php endforeach; endif; unset($_from);  endforeach; endif; unset($_from); ?>
<tr>
<Td colspan=9>
<input type=submit name=submit value=submit>
</td>
</tr>
</table>

</form>

<BR>



<form method=post action=<?php echo $this->_tpl_vars['PHP_SELF']; ?>
>
<Table border=1>
<Tr>
<Td >
New Articles: <input type=checkbox name='confirm_all' value=true> - Confirm All Except as Noted
</td>
</tr>


<?php $_from = $this->_tpl_vars['new_articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['new_articles'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['new_articles']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['article']):
        $this->_foreach['new_articles']['iteration']++;
?>
<input type=hidden name="new_articles[<?php echo $this->_foreach['new_articles']['iteration']; ?>
][ID]" value="<?php echo $this->_tpl_vars['article']['ID']; ?>
">
<TR>
<Td>
<?php echo $this->_tpl_vars['article']['entity_type']; ?>
 <?php echo $this->_tpl_vars['article']['entity_info']['name']; ?>
:
<BR>
<textarea name="new_articles[<?php echo $this->_foreach['new_articles']['iteration']; ?>
][text]" rows=10 cols=80><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['text'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</textarea>
<BR>
<input type=radio name="new_articles[<?php echo $this->_foreach['new_articles']['iteration']; ?>
][action]" value="confirm"> - Confirm <BR>
<input type=radio name="new_articles[<?php echo $this->_foreach['new_articles']['iteration']; ?>
][action]" value="delete"> - Delete <BR>
<input type=radio name="new_articles[<?php echo $this->_foreach['new_articles']['iteration']; ?>
][action]" value="bypass"> - Bypass <BR>
<BR>
<?php echo $this->_tpl_vars['article']['submitter_ip']; ?>

</td>
</tr>

<?php endforeach; endif; unset($_from); ?>
<tr>
<td><input type=submit name=submit value=submit>
</td>
</tr>
</table>

</form>





<BR>



<form method=post action=<?php echo $this->_tpl_vars['PHP_SELF']; ?>
>
<table border=1>
<tr>
<td>
New Files - <input type=checkbox name='confirm_all' value=true> - Confirm All Except as Noted
</td>
</tr>

<?php $_from = $this->_tpl_vars['new_files']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['new_files'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['new_files']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['file']):
        $this->_foreach['new_files']['iteration']++;
?>
<input type=hidden name="new_files[<?php echo $this->_foreach['new_files']['iteration']; ?>
][ID]" value="<?php echo $this->_tpl_vars['file']['ID']; ?>
">
<tr>
<td>
<?php echo $this->_tpl_vars['file']['entity_type']; ?>
 <?php echo $this->_tpl_vars['file']['entity_info']['name']; ?>
: 
<a href='submitted_files/<?php echo $this->_tpl_vars['file']['entity_type']; ?>
/<?php echo $this->_tpl_vars['file']['entity_ID']; ?>
/<?php echo $this->_tpl_vars['file']['filename']; ?>
' target="_blank"><?php echo $this->_tpl_vars['file']['filename']; ?>
</a>
<BR>
<input type=radio name="new_files[<?php echo $this->_foreach['new_files']['iteration']; ?>
][action]" value="confirm"> - Confirm <BR>
<input type=radio name="new_files[<?php echo $this->_foreach['new_files']['iteration']; ?>
][action]" value="delete"> - Delete <BR>
<input type=radio name="new_files[<?php echo $this->_foreach['new_files']['iteration']; ?>
][action]" value="bypass"> - Bypass <BR>

</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
<tr>
<td>
<input type=submit name=submit value=submit>
</td>
</tr>
</table>
</form>