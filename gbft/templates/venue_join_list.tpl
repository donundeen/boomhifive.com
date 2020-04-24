<ul class=connection>
{foreach from=$entity->join_info.venue.approved key=id item=info}
<li class=connection><a href="{$php_self}?type=venue&id={$info.venue_ID}">{$info.name}</a> {if $entity->type neq 'member'}({$info.details}){else} <a href='{$PHP_SELF}?id={$entity->id}&type={$entity->type}&action=delete_join&entity1_type=member&entity1_id={$user->info.ID}&entity2_type=venue&entity2_id={$info.venue_ID}'><em class='x'>Remove</em></a>{/if} 
<i>{$entity->join_num_articles.band.$id|default:"0"} articles</i> <i>{$entity->join_num_files.band.$id|default:"0"} files</i></li>
{/foreach}
</ul>
<ul class=connection>
{foreach from=$entity->join_info.venue.new key=id item=info}
<li class=connection><i>new</i><a href="{$php_self}?type=venue&id={$info.venue_ID}">{$info.name}</a> {if $entity->type neq 'member'}({$info.details}){/if}  <i>{$entity->join_num_articles.band.$id|default:"0"} articles</i> <i>{$entity->join_num_files.band.$id|default:"0"} files</i></li>
{/foreach}
</ul>