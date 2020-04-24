{foreach from=$entity->thumbnailed_images item=image key=image_key}
<a href="submitted_files/{$entity->type}/{$entity->id}/{$image.filename}"><img src="submitted_files/{$entity->type}/{$entity->id}/{$image.filename}" width=150><BR>{$image.filename}</a> - {$image.description}
<BR>
{/foreach}
<ul class=file>
{foreach from=$entity->files item=file key=file_key}
<li class=file><a href="submitted_files/{$entity->type}/{$entity->id}/{$file.filename}">{$file.filename}</a>{$file.description} ({$file.filesize/1000|string_format:"%d"} Kb)</li>
{/foreach}
</ul>