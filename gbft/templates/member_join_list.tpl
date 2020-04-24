<ul class=connection>
{foreach from=$entity->join_info.member.approved key=id item=info}
<li class=connection><a href="{$php_self}?type=member&id={$info.member_ID}">{$info.name}</a>
<i>{$entity->join_num_articles.member.$id|default:"0"} articles</i> <i>{$entity->join_num_files.member.$id|default:"0"} files</i></li>
{/foreach}
</ul>
