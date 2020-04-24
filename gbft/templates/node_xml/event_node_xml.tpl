<node>
	<g id="{$type}{$id}" linkref="http://{$HOST}{$THIS_DIR}/entity.php?type={$type}&amp;id={$id}">
	<circle  cx="0" cy="0" r="3" fill="green"  draggable="true"/>
	<text x="0" y="0"  draggable="true" fill="green">{$name|escape:html}<set attributeName="font-size" from="12" to="18" 
         begin="mouseover" end="mouseout"/></text>
	</g>
</node>
