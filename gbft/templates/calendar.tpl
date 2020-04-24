{include file="header.tpl"}
<div class="middle_cal">
<BR clear="all"/>
{if $user}
{if $user_events_only eq 'true'}
<a href='{$PHP_SELF}?calendar_month={$calendar_month}&calendar_year={$calendar_year}&user_events_only=false'>Show All Events</a>
{else}
<a href='{$PHP_SELF}?calendar_month={$calendar_month}&calendar_year={$calendar_year}&user_events_only=true'>Show Only My Events</a>
{/if}
{/if}
<table border=1>
<tr>
<td colspan=2><a href="{$PHP_SELF}?calendar_month={$prev_month}&calendar_year={$prev_year}">Prev</a></td>
<td colspan=3 align=center>{$date_header_text}</td>
<td colspan=2><a href="{$PHP_SELF}?calendar_month={$next_month}&calendar_year={$next_year}">Next</a></td>
</tr>
<tr>
<td>Sunday</td>
<td>Monday</td>
<td>Tuesday</td>
<td>Wednesday</td>
<td>Thursday</td>
<td>Friday</td>
<td>Saturday</td>
</tr>

{foreach from=$weeks item=week}
<tr>
		
{foreach from=$week.days item=day}
<td valign=top>{$day.date|date_format:"%d"}

<ul>
{foreach from=$day.events item=event}
<li><A href="entity.php?id={$event.ID}&type=event">{if $event.name neq ''}{$event.name}{else}Show{/if}</a> 
{if $event.venue_name neq ''} at <A href="entity.php?type=venue&id={$event.venue_ID}">{$event.venue_name}</A>{/if} 
- {$event.start_time|date_format:"%I:%M %p"}
{if $event.bands}
with 
{foreach name=bandlist from=$event.bands item=band}
<A href="entity.php?id={$band.ID}&type=band">{$band.name}</a>{if !$smarty.foreach.bandlist.last},{/if}
{/foreach}
{/if}
</li> 
{/foreach}
</ul>
</td>


{/foreach}

</tr>
{/foreach}


<tr>
<td colspan=7>
{include file="new_event_form.tpl"}
</table>

</div>