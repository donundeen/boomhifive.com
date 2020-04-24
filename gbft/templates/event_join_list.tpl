
<ul class=connection>
{foreach from=$entity->join_info.event.approved key=id item=info }
{if $TIME_NOW <= $info.start_date}
<li class=connection><a href="{$php_self}?type=event&id={$info.event_ID}">{if $info.name eq ''}Show{else}{$info.name}{/if}</a> <BR>
({$info.start_date} {$info.start_time}) <br>
@ <a href="{$PHP_SELF}?type=venue&id={$info.venue_ID}">{$info.venue_name}</a>


 <BR>
 <em class='y'>
With 
{foreach name=event_band_list from=$info.all_bands item=band}
<a href='{$PHP_SELF}?type=band&id={$band.band_ID}'>{$band.band_name}</a>{if !$smarty.foreach.event_band_list.last}, {/if}
{/foreach}
<BR></em>



{if $entity->type eq 'musician'}
<BR>
<em class='y'>
({$entity->info.name}'s in 
{if $info.num_bands eq '1'}
<a href='{$PHP_SELF}?type=band&id={$info.band_ID}'>{$info.band_name}</a>
{elseif $info.num_bands > 1}
{foreach name=musician_event_band_list from=$info.musician_bands item=band}
<a href='{$PHP_SELF}?type=band&id={$band.band_ID}'>{$band.band_name}</a>{if !$smarty.foreach.musician_event_band_list.last}, {/if}
{/foreach}
{/if})
</em>
{/if}
<BR>
<em class='y'>
<i>{$entity->join_num_articles.event.$id|default:"0"} articles</i> 
<i>{$entity->join_num_files.event.$id|default:"0"} files</i>
</em>

</li>
{/if}

{/foreach} 


</ul>
<ul class=connection>
{foreach from=$entity->join_info.event.new key=id item=info }
{if $TIME_NOW <= $info.start_date}
<li class=connection><i>new!</i><a href="{$php_self}?type=event&id={$info.event_ID}">{if $info.name eq ''}Show{else}{$info.name}{/if}</a><BR>
 ({$info.start_date} {$info.start_time}) <BR>
 @ <a href="{$PHP_SELF}?type=venue&id={$info.venue_ID}">{$info.venue_name}</a>
 
 <BR>
 <em class='y'>
With 
{foreach name=event_band_list from=$info.all_bands item=band}
<a href='{$PHP_SELF}?type=band&id={$band.band_ID}'>{$band.band_name}</a>{if !$smarty.foreach.event_band_list.last}, {/if}
{/foreach}
<BR></em>

 
 {if $entity->type eq 'musician'}
 <BR>
 <em class='y'>
({$entity->info.name}'s in 
 {if $info.num_bands eq '1'}
 <a href='{$PHP_SELF}?type=band&id={$info.band_ID}'>{$info.band_name}</a>
 {elseif $info.num_bands > 1}
 {foreach name=musician_event_band_list from=$info.musician_bands item=band}
 <a href='{$PHP_SELF}?type=band&id={$band.band_ID}'>{$band.band_name}</a>{if !$smarty.foreach.musician_event_band_list.last}, {/if}
 {/foreach}
 {/if})
 <em>
 {/if}

 
 <BR>
 <i>{$entity->join_num_articles.event.$id|default:"0"} articles</i> 
<i>{$entity->join_num_files.event.$id|default:"0"} files</i>
</li>
{/if}
{/foreach}
</ul>

<hr>
<ul class=connection>
<b class="entity_join_list_name">Past Events :</b>
{foreach from=$entity->join_info.event.approved key=id item=info }
{if $TIME_NOW > $info.start_date}
<li class=connection><a href="{$php_self}?type=event&id={$info.event_ID}">{if $info.name eq ''}Show{else}{$info.name}{/if}</a> <BR>
({$info.start_date} {$info.start_time}) <BR>
{if $entity->type neq 'venue'}
@ <a href="{$PHP_SELF}?type=venue&id={$info.venue_ID}">{$info.venue_name}</a><BR>
{/if}
 

<em class='y'>
With 
{foreach name=event_band_list from=$info.all_bands item=band}
<a href='{$PHP_SELF}?type=band&id={$band.band_ID}'>{$band.band_name}</a>{if !$smarty.foreach.event_band_list.last}, {/if}
{/foreach}
</em>

 
 
{if $entity->type eq 'musician'}
<em class='y'>
({$entity->info.name}'s in 
{if $info.num_bands eq '1'}
<a href='{$PHP_SELF}?type=band&id={$info.band_ID}'>{$info.band_name}</a>
{elseif $info.num_bands > 1}
{foreach name=musician_event_band_list from=$info.musician_bands item=band}
<a href='{$PHP_SELF}?type=band&id={$band.band_ID}'>{$band.band_name}</a>{if !$smarty.foreach.musician_event_band_list.last}, {/if}
{/foreach}
{/if}
)</em>
 {/if}
 <BR>
<em class='y'>
<i>{$entity->join_num_articles.event.$id|default:"0"} articles</i> 
<i>{$entity->join_num_files.event.$id|default:"0"} files</i>
</em>
</li>
{/if}

{/foreach} 
</ul>
<ul class=connection>
{foreach from=$entity->join_info.event.new key=id item=info }
{if $TIME_NOW > $info.start_date}
<li class=connection><i>new!</i><a href="{$php_self}?type=event&id={$info.event_ID}">{if $info.name eq ''}Show{else}{$info.name}{/if}</a><BR>
 ({$info.start_date} {$info.start_time}) <BR>
 {if $entity->type neq 'venue'}
 @ <a href="{$PHP_SELF}?type=venue&id={$info.venue_ID}">{$info.venue_name}</a>
 {/if}
<BR> 
<em class='y'>
With 
{foreach name=event_band_list from=$info.all_bands item=band}
<a href='{$PHP_SELF}?type=band&id={$band.band_ID}'>{$band.band_name}</a>{if !$smarty.foreach.event_band_list.last}, {/if}
{/foreach}
</em>
 
 {if $entity->type eq 'musician'}
 <BR><em class='y'>
 ({$entity->info.name}'s in 
 {if $info.num_bands eq '1'}
 <a href='{$PHP_SELF}?type=band&id={$info.band_ID}'>{$info.band_name}</a>
 {elseif $info.num_bands > 1}
 {foreach name=musician_event_band_list from=$info.musician_bands item=band}
 <a href='{$PHP_SELF}?type=band&id={$band.band_ID}'>{$band.band_name}</a>{if !$smarty.foreach.musician_event_band_list.last}, {/if}
 {/foreach}
 {/if})
 </em>
 {/if}
 <BR>
 <em class='y'>
<i>{$entity->join_num_articles.event.$id|default:"0"} articles</i> 
<i>{$entity->join_num_files.event.$id|default:"0"} files</i>
</em>
</li>
{/if}
{/foreach}
</ul>