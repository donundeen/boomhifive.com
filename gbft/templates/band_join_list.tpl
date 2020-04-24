<ul class=connection>

 
{foreach from=$entity->join_info.band.approved key=id item=info }
<li class=connection><a href="{$php_self}?type=band&id={$info.band_ID}">{$info.name}</a> 
{if $entity->type neq 'member'}({if $entity->type eq "event"}{$info.details|date_format:"%I:%M %p"}{else}{$info.details}{/if})<a href=# onclick="toggle_alternate_div_content('{$entity->type}_band_{$info.ID}');"><em class="x">(!)</em></a>{else} <a href='{$PHP_SELF}?id={$entity->id}&type={$entity->type}&action=delete_join&entity1_type=member&entity1_id={$user->info.ID}&entity2_type=band&entity2_id={$info.band_ID}'><em class='x'>Remove</em></a>{/if}
 <i>{$entity->join_num_articles.band.$id|default:"0"} articles</i> <i>{$entity->join_num_files.band.$id|default:"0"} files</i></li>
<div id='{$entity->type}_band_{$info.ID}'></div>
<div id='{$entity->type}_band_{$info.ID}_alternate'><em class='z'>Correct These Details:</em>
<form method=post  action={$PHP_SELF}>
<input type=hidden name=action value='edit_join'>
<input type=hidden name=type value='{$entity->type}'>
<input type=hidden name=id value='{$entity->id}'>
<input type=hidden name=entity1_type value='{$entity->type}'>
<input type=hidden name=entity2_type value='band'>
<input type=hidden name=join_id value='{$info.ID}'>
<input type=text   name=join_details value='{$info.details}'>
<input type=hidden name='{$entity->type}_ID' value='{$entity->id}'>
<input type=hidden name='band_ID' value='{$info.band_ID}'>
<BR>
<input type=submit name=submit value=submit>
{if $info.changes}
<em class='y'>
<Br>recent unapproved changes:<BR>
{foreach from=$info.changes item=change}
 - {$change.details}<BR>
{/foreach}
</em>
{/if}
</form>
</div>
<script>hide_alternate_div_content('{$entity->type}_band_{$info.ID}');</script>

{/foreach}
</ul>
<ul class=connection>
{foreach from=$entity->join_info.band.new key=id item=info }
<li class=connection><i>new!</i><a href="{$php_self}?type=band&id={$info.band_ID}">{$info.name}</a> {if $entity->type neq 'member'}({$info.details}){/if} <i>{$entity->join_num_articles.band.$id|default:"0"} articles</i> <i>{$entity->join_num_files.band.$id|default:"0"} files</i></li>
{/foreach}
</ul>