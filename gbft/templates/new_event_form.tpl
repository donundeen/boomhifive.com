<form  class="hideable" name="calendar_new_event_form"  onsubmit="return liveSearchSubmit()" id="calendar_new_event_form"   method=post action={$PHP_SELF}>
Event Name: <input type=text size=30 name='event_name' value='show'>
<br>
<input type=hidden name=action value="add_event_from_calendar">
Date and Time:<input type=hidden id="start_date" name="start_date" size=10 />
<span id='show_date'>Click on Calendar:</span>
<img src="jscalendar/img.gif" id="trigger"
     style="cursor: pointer; border: 1px solid red;"
     title="Date selector"
     onmouseover="this.style.background='red';"
     onmouseout="this.style.background=''" />


<br>
<!--
start time:
{include file="pick_time_element.tpl" element_name="start_time"}
-->


<BR>
at Venue:
<input type=text id="venue_name" name="venue_name" size=20  onkeypress="liveSearchStart('calendar_new_event_form','venue_name','venue','livesearch.php');" >
<div id="calendar_new_event_form_venue_name_LSResult" style="display: none;"><div id="calendar_new_event_form_venue_name_LSShadow"></div></div>

Bands:<BR>
1. 
<input type=text id="band_name1" name="band_name1" size=20  onkeypress="liveSearchStart('calendar_new_event_form','band_name1','band','livesearch.php');" >
<div id="calendar_new_event_form_band_name1_LSResult" style="display: none;"><div id="calendar_new_event_form_band_name1_LSShadow"></div></div>

Starts at: {include file="pick_time_element.tpl" element_name="band1_start"}
<BR>

2. 
<input type=text id="band_name2" name="band_name2" size=20  onkeypress="liveSearchStart('calendar_new_event_form','band_name2','band','livesearch.php');" >
<div id="calendar_new_event_form_band_name2_LSResult" style="display: none;"><div id="calendar_new_event_form_band_name2_LSShadow"></div></div>
Starts at: {include file="pick_time_element.tpl" element_name="band2_start"}
<BR>

3. 
<input type=text id="band_name3" name="band_name3" size=20  onkeypress="liveSearchStart('calendar_new_event_form','band_name3','band','livesearch.php');" >
<div id="calendar_new_event_form_band_name3_LSResult" style="display: none;"><div id="calendar_new_event_form_band_name3_LSShadow"></div></div>
Starts at: {include file="pick_time_element.tpl" element_name="band3_start"}
<BR>

4. 
<input type=text id="band_name4" name="band_name4" size=20  onkeypress="liveSearchStart('calendar_new_event_form','band_name4','band','livesearch.php');" >
<div id="calendar_new_event_form_band_name4_LSResult" style="display: none;"><div id="calendar_new_event_form_band_name4_LSShadow"></div></div>


Starts at: {include file="pick_time_element.tpl" element_name="band4_start"}
<BR>
<input type=submit name=submit value="submit">
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
