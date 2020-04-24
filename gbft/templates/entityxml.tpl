<?xml version="1.0"?>
<xml id="xmlDoc">
<allData>
<nodes>
{include file="node_xml/`$entity->type`_node_xml.tpl" type=$entity->type name=$entity->info.name id=$entity->id}
{foreach from=$entity->join_info key=child_type item=joinlist }
	{foreach from=$joinlist.approved key=child_id item=child_entity}
	{if $child_type eq 'band' or $child_type eq 'musician'}
{include file="node_xml/`$child_type`_node_xml.tpl" type=$child_type name=$child_entity.name id=$child_id}
{/if}
	{/foreach}
	
{/foreach}


</nodes>
<connections>
{foreach from=$entity->join_info key=child_type item=joinlist }
{if $child_type eq 'band' or $child_type eq 'musician'}
	{foreach from=$joinlist.approved key=child_id item=child_entity}

<connection >
{if $entity->type > $child_type}
<line  id="{$child_type}{$child_id}_{$entity->type}{$entity->id}" x1="0" y1="0" x2="0" y2="0" stroke="black" stroke-width="black" fill="black" node1="{$child_type}{$child_id}"     node2="{$entity->type}{$entity->id}" />
{else}
<line  id="{$entity->type}{$entity->id}_{$child_type}{$child_id}" x1="0" y1="0" x2="0" y2="0"  stroke="black" stroke-width="black" fill="black" node1="{$entity->type}{$entity->id}" node2="{$child_type}{$child_id}"/>
{/if}
</connection>
	{/foreach}	
	{/if}
{/foreach}
</connections>
</allData>
</xml>