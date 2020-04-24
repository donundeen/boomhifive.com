<div class="entity_join_list">
<b class="entity_join_list_name">Band members:</b>
{include file='musician_join_list.tpl'}
<form name="musician_searchform" id="musician_searchform"   onsubmit="return liveSearchSubmit()" method=post action={$PHP_SELF}>
<input type=hidden name=action value="add_join">
<input type=hidden name=entity1_type value="{$entity->type}">
<input type=hidden name=entity1_id value="{$entity->id}">
<input type=hidden name=type value="{$entity->type}">
<input type=hidden name=id value="{$entity->id}">
<input type=hidden  name=entity2_type value="musician">
Add Band Member:
<input type=text id="livesearch" name="entity2_name" size=20  onkeypress="liveSearchStart('musician_searchform','entity2_name','musician','livesearch.php');" >
<div id="musician_searchform_entity2_name_LSResult" style="display: none;"><div id="musician_searchform_entity2_name_LSShadow"></div></div>



Instrument (years) :
<input type=text name=join_details size=20>
<input type=submit name=submit value=Add>
</form>




<hr>

<b class="entity_join_list_name">Upcoming Events!</b>
{include file='event_join_list.tpl'}
<form name="venue_searchform" id="venue_searchform"   onsubmit="return liveSearchSubmit()" method=post action={$PHP_SELF}>
<input type=hidden name=action value="add_event">
<input type=hidden name=entity1_type value="{$entity->type}">
<input type=hidden name=entity1_id value="{$entity->id}">
<input type=hidden name=band_id value="{$entity->id}">
<input type=hidden name=type value="{$entity->type}">
<input type=hidden name=id value="{$entity->id}">
<input type=hidden  name=entity2_type value="venue">
Add Event:
<BR>
Name: <input type=text name=event_name size=20>
<BR>
Date: 
<input type=hidden id="start_date" name="start_date" size=10 />
<span id='show_date'>Click on Calendar:</span>
<img src="jscalendar/img.gif" id="trigger"
     style="cursor: pointer; border: 1px solid red;"
     title="Date selector"
     onmouseover="this.style.background='red';"
     onmouseout="this.style.background=''" />
<BR>
This Band starts at:
<BR>
{include file="pick_time_element.tpl" element_name="details"}
<BR>
At venue:
<input type=text id="livesearch" name="entity2_name" size=20  onkeypress="liveSearchStart('venue_searchform','entity2_name','venue','livesearch.php');" >
<div id="venue_searchform_entity2_name_LSResult" style="display: none;"><div id="venue_searchform_entity2_name_LSShadow"></div></div>

{if $user_subscription_level eq 'private'}
<input type=radio name='event_type' value='public' CHECKED> - Public 
<input type=radio name='event_type' value='private' > - Private 
{else}
<input type=hidden name='event_type' value='public'> 
{/if}
<BR>

<input type=submit name=submit value=Add>
</form>
	
<script type="text/javascript">
{literal}
  Calendar.setup(
    {
      inputField  : "start_date",         // ID of the input field
      displayArea : "show_date",         
      ifFormat    : "%m/%d/%Y %I:%M %p",    // the date format
	  daFormat	  : "%m/%d/%Y %I:%M %p",
      button      : "trigger",       // ID of the button
      showsTime	  : "true",
      timeFormat  : "12"
    }
  );
{/literal}
  
</script>

<hr>

<b class="entity_join_list_name">{$entity->info.name} has played at:</b>
{include file='venue_join_list.tpl'}


<hr>
<b class="entity_join_list_name">{$entity->info.name} is being watched by:</b>
{include file='member_join_list.tpl'}


</div>