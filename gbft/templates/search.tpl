{include file="header.tpl"}

<br>

<div class="search_results">
<em class='b'>Search Results</em><Br>
<hr>
{foreach from=$search_results item=results key=table_name}
<ul>
<em class='a'>Matching {$table_name}s:</em>
{foreach from=$results key=id item=result}
<li><a href='entity.php?type={$table_name}&id={$result.ID}'>{$result.name}</a></li>
{foreachelse}None
{/foreach}
</ul>
{/foreach}
<hr>
<ul>
<em class='a'>Matching Articles</em><br>
{foreach from=$article_search_results key=table_name item=articles}
{foreach from=$articles item=article}
<li>The {$article.entity_type} <a href='entity.php?type={$table_name}&id={$article.entity_ID}'>{$article.entity_name}</a></li>
{/foreach}
{/foreach}
</ul>
</div>