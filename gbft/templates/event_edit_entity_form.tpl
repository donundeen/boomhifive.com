Date:
<input type=hidden id="start_date" name="start_date" size=10 />
<span id='show_date'>{$entity->info.start_date} {$entity->info.start_time}
</span>
<img src="jscalendar/img.gif" id="trigger"
     style="cursor: pointer; border: 1px solid red;"
     title="Date selector"
     onmouseover='this.style.background="red"; {literal}
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
{/literal}'
     onmouseout="this.style.background=''"       />
{if $entity->type eq 'event'}

{/if}


<br>
<!--
<input type=radio name=event_type value='public' {if $entity->info.event_type eq 'public'}CHECKED{/if}> public 
<input type=radio name=event_type value='private'  {if $entity->info.event_type eq 'private'}CHECKED{/if}> private 
-->
<br>