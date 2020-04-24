<select name={$element_name}time_hour>
{section start=0 name=hour loop=24}
<option value='{$smarty.section.hour.index}' {if $value_hour eq $smarty.section.hour.index}SELECTED{/if}>{if $smarty.section.hour.index >= 12}p.m. {if $smarty.section.hour.index eq 12}12{else}{$smarty.section.hour.index-12}{/if}{else}a.m. {if $smarty.section.hour.index eq 0}12{else}{$smarty.section.hour.index}{/if}{/if}</option>
{/section}
</select>
:
<select name={$element_name}time_minute>
{section name=minute loop=60 start=0}
<option value='{$smarty.section.minute.index}' {if $value_minute eq $smarty.section.minute.index}SELECTED{/if}>{$smarty.section.minute.index|string_format:"%02s"}</option>
{/section}
</select>