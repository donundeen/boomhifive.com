<div class="entity_join_list">
<b class="entity_join_list_name">Has Played in the Bands:</b>
{include file='band_join_list.tpl'}


<form  class="hideable" name="band_searchform" id="band_searchform"   onsubmit="return liveSearchSubmit()" method=post action={$PHP_SELF}>
<input type=hidden name=action value="add_join">
<input type=hidden name=entity1_type value="{$entity->type}">
<input type=hidden name=entity1_id value="{$entity->id}">
<input type=hidden name=type value="{$entity->type}">
<input type=hidden name=id value="{$entity->id}">
Add Band:
<input type=text class="livesearch" name="entity2_name" size=20  onkeypress="liveSearchStart('band_searchform','entity2_name','band','livesearch.php');" >
<input type=hidden  name=entity2_type value="band">
<div id="band_searchform_entity2_name_LSResult" style="display: none;"><div id="band_searchform_entity2_name_LSShadow"></div></div>
Instrument (years) :
<input type=text name=join_details size=20>
<input type=submit name=submit value=Add>
</form>
<hr>
<b class="entity_join_list_name">{$entity->info.name} has worked at:</b>
{include file='venue_join_list.tpl'}
<form  class="hideable"  name="venue_searchform" id="venue_searchform"   onsubmit="return liveSearchSubmit()" method=post action={$PHP_SELF}>
<input type=hidden name=action value="add_join">
<input type=hidden name=entity1_type value="{$entity->type}">
<input type=hidden name=entity1_id value="{$entity->id}">
<input type=hidden name=type value="{$entity->type}">
<input type=hidden name=id value="{$entity->id}">
Add Venue:
<input type=text class="livesearch" name="entity2_name" size=20  onkeypress="liveSearchStart('venue_searchform','entity2_name','venue','livesearch.php');" >
<input type=hidden  name=entity2_type value="venue">
<div id="venue_searchform_entity2_name_LSResult" style="display: none;"><div id="venue_searchform_entity2_name_LSShadow"></div></div>
<input type=submit name=submit value=Add>
</form>

<hr>

<b class="entity_join_list_name">Upcoming Events!</b>
{include file='event_join_list.tpl'}

<hr>
<b class="entity_join_list_name">{$entity->info.name} is being watched by:</b>
{include file='member_join_list.tpl'}




</div>