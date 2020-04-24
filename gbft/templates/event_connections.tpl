<div class="entity_join_list">

<b class="entity_join_list_name">At Venue:</b>
{include file='venue_join_list.tpl'}

{if count($entity->join_info.venue.approved) == 0 and count($entity->join_info.venue.new) == 0}
<form name="venue_searchform" id="venue_searchform"   onsubmit="return liveSearchSubmit('venue')" method=post action={$PHP_SELF}>
<input type=hidden name=action value="add_join">
<input type=hidden name=entity1_type value="{$entity->type}">
<input type=hidden name=entity1_id value="{$entity->id}">
<input type=hidden name=type value="{$entity->type}">
<input type=hidden name=id value="{$entity->id}">
Add Venue:
<input type=text id="livesearch" name="entity2_name" size=20  onkeypress="liveSearchStart('venue_searchform','entity2_name','venue','livesearch.php');" >
<input type=hidden  name=entity2_type value="venue">
<div id="venue_searchform_entity2_name_LSResult" style="display: none;"><div id="venue_searchform_entity2_name_LSShadow"></div></div>
<input type=submit name=submit value=Add>
</form>
{/if}
<hr>

<b class="entity_join_list_name">Featuring the Bands:</b>
{include file='band_join_list.tpl'}
<form name="band_searchform" id="band_searchform"   onsubmit="return liveSearchSubmit('band')" method=post action={$PHP_SELF}>
<input type=hidden name=action value="add_join">
<input type=hidden name=entity1_type value="{$entity->type}">
<input type=hidden name=entity1_id value="{$entity->id}">
<input type=hidden name=type value="{$entity->type}">
<input type=hidden name=id value="{$entity->id}">
Add Band:
<input type=text id="livesearch" name="entity2_name" size=20  onkeypress="liveSearchStart('band_searchform','entity2_name','band','livesearch.php');" >
<input type=hidden  name=entity2_type value="band">
<div id="band_searchform_entity2_name_LSResult" style="display: none;"><div id="band_searchform_entity2_name_LSShadow"></div></div>
This Band starts at:
<BR>
{include file="pick_time_element.tpl" element_name="details"}
<input type=submit name=submit value=Add>
</form>
<hr>

<b class="entity_join_list_name">This event is being watched by:</b>
{include file='member_join_list.tpl'}


</div>