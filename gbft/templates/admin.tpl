<form method=post action='{$PHP_SELF}'>


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


{foreach from=$new_entities key=type item=entities}
{foreach name=new_entities  from=$entities item=entity}

<input type=hidden name="new_entities[{$type}][{$smarty.foreach.new_entities.iteration}][ID]" value="{$entity.ID}">
<input type=hidden name="new_entities[{$type}][{$smarty.foreach.new_entities.iteration}][type]" value="{$type}">
<tr>
<td>{$type}</td>
<td>{$entity.name}</td>
<td>{foreach from=$entity key=col item=value}
{$col}:{$value}<BR>
{/foreach}
</td>
<td><input type=radio name="new_entities[{$type}][{$smarty.foreach.new_entities.iteration}][action]" value="confirm"> - Confirm</td>
<td><input type=radio name="new_entities[{$type}][{$smarty.foreach.new_entities.iteration}][action]" value="delete"> - Delete</td>
<td><input type=radio name="new_entities[{$type}][{$smarty.foreach.new_entities.iteration}][action]" value="bypass"> - Bypass</td>
</tr>
{/foreach}
{/foreach}
<tr>
<Td colspan=6>
<input type=submit name=submit value=submit>
</form>
</td>
</tr>
</table>


<BR>



<form method=post action={$PHP_SELF}>
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
{foreach  from=$change_entities key=type item=entities}
{foreach name=change_entities from=$entities item=entity}
<input type=hidden name="change_entities[{$type}][{$smarty.foreach.change_entities.iteration}][ID]" value="{$entity.ID}">
<input type=hidden name="change_entities[{$type}][{$smarty.foreach.change_entities.iteration}][type]" value="{$type}">
<tr>
<td>{$type}</td>
<td>{$entity.name}</td>
<td>{foreach from=$entity.info key=col item=value}
{$col}:{$value}<BR>
{/foreach}
</td>

<Td>{$entity.orig_row.name}</td>
<td>{foreach from=$entity.orig_row key=col item=value}
{$col}:{$value}<BR>
{/foreach}
</td>
<td><input type=radio name="change_entities[{$type}][{$smarty.foreach.change_entities.iteration}][action]" value="confirm"> - Confirm</td>
<td><input type=radio name="change_entities[{$type}][{$smarty.foreach.change_entities.iteration}][action]" value="delete"> - Delete</td>
<td><input type=radio name="change_entities[{$type}][{$smarty.foreach.change_entities.iteration}][action]" value="bypass"> - Bypass</td>
</tr>
{/foreach}
{/foreach}

<tr>
<Td colspan=6>
<input type=submit name=submit value=submit>
</form>
</td>
</tr>
</table>



<BR>




<form method=post action={$PHP_SELF}>
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
{foreach from=$new_joins key=table_name item=joins}
{foreach name=new_joins from=$joins item=join}

<input type=hidden name="new_joins[{$table_name}][{$smarty.foreach.new_joins.iteration}][ID]" value="{$join.ID}">
<input type=hidden name="new_joins[{$table_name}][{$smarty.foreach.new_joins.iteration}][table_name]" value="{$table_name}">
<tr>
<td>{$join.entity_1_type}</td>
<td>{$join.entity_1_name}</td>
<td>{$join.entity_2_type}</td>
<td>{$join.entity_2_name}</td>
<td>{$join.details}</td>
<td>{foreach from=$join key=col item=value}
{$col}:{$value}<Br>
{/foreach}
</td>
<td><input type=radio name="new_joins[{$table_name}][{$smarty.foreach.new_joins.iteration}][action]" value="confirm"> - Confirm</td>
<td><input type=radio name="new_joins[{$table_name}][{$smarty.foreach.new_joins.iteration}][action]" value="delete"> - Delete</td>
<td><input type=radio name="new_joins[{$table_name}][{$smarty.foreach.new_joins.iteration}][action]" value="bypass"> - Bypass</td>
</tr>

{/foreach}
{/foreach}
<tr>
<Td colspan=8>
<input type=submit name=submit value=submit>
</td>
</tr>
</table>

</form>





<BR>



<form method=post action={$PHP_SELF}>

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

{foreach from=$change_joins key=table_name item=joins}
{foreach name=change_joins from=$joins item=join}
<input type=hidden name="change_joins[{$table_name}][{$smarty.foreach.change_joins.iteration}][ID]" value="{$join.ID}">
<input type=hidden name="change_joins[{$table_name}][{$smarty.foreach.change_joins.iteration}][table_name]" value="{$table_name}">
<tr>
<td>{$join.entity_1_type}</td>
<td>{$join.entity_1_name}</td>
<td>{$join.entity_2_type}</td>
<td>{$join.entity_2_name}</td>
<td>{foreach from=$join.orig_row key=col item=value}
{$col}:{$value}<BR>
{/foreach}
</td>
<td>{foreach from=$join.info key=col item=value}
{$col}:{$value}<BR>
{/foreach}
</td>
<td><input type=radio name="change_joins[{$table_name}][{$smarty.foreach.change_joins.iteration}][action]" value="confirm"> - Confirm</td>
<td><input type=radio name="change_joins[{$table_name}][{$smarty.foreach.change_joins.iteration}][action]" value="delete"> - Delete</td>
<td><input type=radio name="change_joins[{$table_name}][{$smarty.foreach.change_joins.iteration}][action]" value="bypass"> - Bypass</td>
</tr>

{/foreach}
{/foreach}
<tr>
<Td colspan=9>
<input type=submit name=submit value=submit>
</td>
</tr>
</table>

</form>

<BR>



<form method=post action={$PHP_SELF}>
<Table border=1>
<Tr>
<Td >
New Articles: <input type=checkbox name='confirm_all' value=true> - Confirm All Except as Noted
</td>
</tr>


{foreach name=new_articles from=$new_articles item=article}
<input type=hidden name="new_articles[{$smarty.foreach.new_articles.iteration}][ID]" value="{$article.ID}">
<TR>
<Td>
{$article.entity_type} {$article.entity_info.name} (ID {$article.entity_ID}):
<BR>
<textarea name="new_articles[{$smarty.foreach.new_articles.iteration}][text]" rows=10 cols=80>{$article.text|escape:"html"}</textarea>
<BR>
<input type=radio name="new_articles[{$smarty.foreach.new_articles.iteration}][action]" value="confirm"> - Confirm <BR>
<input type=radio name="new_articles[{$smarty.foreach.new_articles.iteration}][action]" value="delete"> - Delete <BR>
<input type=radio name="new_articles[{$smarty.foreach.new_articles.iteration}][action]" value="bypass"> - Bypass <BR>
<BR>
{$article.submitter_ip}
</td>
</tr>

{/foreach}
<tr>
<td><input type=submit name=submit value=submit>
</td>
</tr>
</table>

</form>





<BR>



<form method=post action={$PHP_SELF}>
<table border=1>
<tr>
<td>
New Files - <input type=checkbox name='confirm_all' value=true> - Confirm All Except as Noted
</td>
</tr>

{foreach from=$new_files item=file name=new_files}
<input type=hidden name="new_files[{$smarty.foreach.new_files.iteration}][ID]" value="{$file.ID}">
<tr>
<td>
{$file.entity_type} {$file.entity_info.name}: 
<a href='submitted_files/{$file.entity_type}/{$file.entity_ID}/{$file.filename}' target="_blank">{$file.filename}</a>
<BR>
<input type=radio name="new_files[{$smarty.foreach.new_files.iteration}][action]" value="confirm"> - Confirm <BR>
<input type=radio name="new_files[{$smarty.foreach.new_files.iteration}][action]" value="delete"> - Delete <BR>
<input type=radio name="new_files[{$smarty.foreach.new_files.iteration}][action]" value="bypass"> - Bypass <BR>

</td>
</tr>
{/foreach}
<tr>
<td>
<input type=submit name=submit value=submit>
</td>
</tr>
</table>
</form>