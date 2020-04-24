{include file="header.tpl"}
<br clear="all">
<div class="page_title" id="page_title">
<em class="a">this is the</em> <em class="b">{$entity->type}</em> <em class="c">{$entity->info.name}</em>
<em class=x><a href="#" onclick="toggle_alternate_div_content('page_title');">{if $entity->type neq 'member' or $user->info.ID eq $entity->id}(!){/if}</a></em>
{assign var="tpl_name" value="`$entity->type`_additional_info.tpl"}
{if $ALL_TEMPLATES.$tpl_name}{include file=$tpl_name}{/if}

</div>
<div id="page_title_alternate" class="edit_entity_info" >
<form method=post action='{$PHP_SELF}' class="hideable">
<em class="a">this is the</em> <em class="b">{$entity->type}</em> <em class="c">{$entity->info.name}</em>
<BR>Oh, so you think this {$entity->type}'s info is wrong, do you?<BR> Submit your correction.
{if $entity->unapproved_entity_changes}
<BR>
<i>
Current Pending corrections:<BR>
{foreach name=unapproved_entity_changes from=$entity->unapproved_entity_changes item=entity_change}
<hr>
{foreach from=$entity_change key=column item=value}
{if $column neq 'submitter_ip' and $column neq 'submitter_member_ID' and $column neq 'status' and $column neq 'ID' and $column neq 'orig_id' and $column neq 'submit_date' and $column neq 'submitter_email' and $column neq 'submitter_name'}
{$column} : {$value}<BR>
{/if}
{/foreach}
{/foreach}
</i>
{/if}
<input type=hidden name='entity_type' value='{$entity->type}'>
<input type=hidden name='type' value='{$entity->type}'>
<input type=hidden name='entity_id' value='{$entity->id}'>
<input type=hidden name='id' value='{$entity->id}'>
<input type=hidden name='action' value='edit_entity'>
<BR>Correct Spelling of name: <input type=text name='entity_name' value='{$entity->info.name|escape:"html"}' size=20>
<BR>
{assign var="tpl_name" value="`$entity->type`_edit_entity_form.tpl"}
{if $ALL_TEMPLATES.$tpl_name}{include file=$tpl_name}{/if}
<input type=submit name=submit value='submit correction'>
</form>
<em class=x><a href="#" onclick="toggle_alternate_div_content('page_title');">(close form)</a></em>
</div>

<script>hide_alternate_div_content('page_title');</script>


<div class="everything">

<div class="leftbar">


{include file="`$entity->type`_connections.tpl"}
</div>
<div class="middle">

<div class="articles">
<h1>Articles:</h1>

{section name=id loop=$entity->articles}
<div class="article">

<div class="article_header">
<div class="article_submitter">
{$entity->articles[id].submitter_name}
</div>
<div class="article_submitter_email">
{$entity->articles[id].submitter_email}
</div>
 <div class="article_submit_date">
 {$entity->articles[id].submit_date|date_format}
 </div>
</div>
<br clear="all"/>
 <div class="article_content">
{$entity->articles[id].text}
 </div>
</div>
{/section}
<hr>
<div class="article_form">
<div class="article_form_header">
<h1>Add Article:</h1>
</div>
<form method=post action='{$PHP_SELF}' class="hideable">
<input type=hidden name=action value='add_article'>
<input type='hidden' name=entity_type  value='{$entity->type}'>
<input type='hidden' name=entity_id  value='{$entity->id}'>
<div class="article_form_name">
Your Name:<input type=text name="submitter_name" size=20>
</div>
<BR>
<div class="article_form_email">
Your Email:<input type=text name="submitter_email" size=20>
</div>
<div class="article_form_text">
<textarea name='article_text' rows=10 cols=40></textarea>
<BR>
<input type=submit name=submit value=submit>
</div>
</form>

{if $entity->type eq 'venue'}

<div id="map" style="width: 500px; height: 300px"></div>
{if $entity->info.address neq '' and (($entity->info.state neq '' and $entity->info.city neq '' ) or $entity->info.zip neq '')}
<script type="text/javascript">
loadLocationAddress('{$entity->info.address}, {$entity->info.city}, {$entity->info.state}');
</script>
{else}
<script type="text/javascript">
loadLocationAddress('{$CITY_NAME}, {$STATE_NAME}');
</script>

{/if}
{/if}
</div>



</div>
</div>



<div class="rightbar">
{if $entity->type eq 'member' and $user->info.name and $user->info.ID eq $entity->id}

{if $user->info.public_visible eq 'y'}
This page is visible to others. 
<a href='{$PHP_SELF}?type={$entity->type}&id={$entity->id}&action=set_public_visible&public_visible=n'>Make this page Private</a>
{else}
This page is hidden to others. 
<a href='{$PHP_SELF}?type={$entity->type}&id={$entity->id}&action=set_public_visible&public_visible=y'>Make this page Public</a>
{/if}

{/if}


{if $user->info.name and ($entity->type neq "member" or $user->info.ID neq $entity->id)}

<!--
{if $user_subscription_level eq 'private'}
You're subscribed to this {$entity->type}'s Public and Private Events<br>
Change Subscription level to 
<a href='{$PHP_SELF}?type={$entity->type}&id={$entity->id}&user_id={$user->id}&action=subscribe_user&subscription_level=public'>Public</a>
<a href='{$PHP_SELF}?type={$entity->type}&id={$entity->id}&user_id={$user->id}&action=unsubscribe_user'>Unsubscribe</a>
{/if}
-->

{if $user_subscription_level eq 'public'}
This {$entity->type} is in your watchlist<Br>
<!--Change subscription level to <a href='{$PHP_SELF}?type={$entity->type}&id={$entity->id}&user_id={$user->id}&action=subscribe_user&subscription_level=private'>Private</a>-->
<a href='{$PHP_SELF}?type={$entity->type}&id={$entity->id}&user_id={$user->id}&action=unsubscribe_user'>Remove from Watchlist</a>
{/if}

{if $user_subscription_level eq ''}
<a href='{$PHP_SELF}?type={$entity->type}&id={$entity->id}&user_id={$user->id}&action=subscribe_user&subscription_level=public'>Add this {$entity->type} to my watchlist!</a><BR>
<!--
{if $user_subscription_level neq "private"}
<a href='{$PHP_SELF}?type={$entity->type}&id={$entity->id}&user_id={$user->id}&action=subscribe_user&subscription_level=private'>Private</a>
{/if}

{if $user_subscription_level neq "public"}
<a href='{$PHP_SELF}?type={$entity->type}&id={$entity->id}&user_id={$user->id}&action=subscribe_user&subscription_level=public'>Public</a>
{/if}
-->
{/if}



{/if}

<div class="file_list_name">Files</div>
{include file="file_list.tpl"}

<BR>
{include file='file_upload_form.tpl'}
</div>




</div>


</body>
</html>