{include file="header.tpl"}
<br clear="all">
<div class="page_title" id="page_title">
<em class="a">These Are</em> <em class="b">All The</em> <em class="c">{$all_entities->type}s</em>
</div>
<ul class='connection'>
{foreach from=$all_entities->entities  item=entity}
<li>
{if $all_entities->type eq 'event'}
{$entity.start_date} -
{/if}
<a href='entity.php?type={$all_entities->type}&id={$entity.ID}'>{$entity.name}</a></li>
{/foreach}
</ul>
</body>
</html>