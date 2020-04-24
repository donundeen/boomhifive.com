{include file='header.tpl'}
<br clear="all">

<div class="page_title" id="page_title">
<em class="a">this is the</em> <em class="c">User Registration Page</em>
</div>



<div class="everything">


<div class="middle">



{if $user_registered}
You are registered now!
<a href="{$return_page}">Go Back to the page you were on</a>
{else}
<Br><BR>
Register With the {$CITY_NAME} Band Family Tree
<BR>
<i>Why Register?</i>
<ul>
<li>When you're registered, you can put venues, musician, bands, etc. in your 'watchlist.'</li>
<li>When events are coming up that involve stuff on your watchlist, you can get emails sent to remind you.</li>
<li>If you're in a band, being registered allows you to arrange rehearsals and private events with other registered members.</li>
<li>Um... it's cool?</li>
<li>Email Address & Privacy: We'll <b>ONLY</B> use your email to send out event reminders for your watchlist, and any other email services we think up later, that you <b>EXPLICITLY AGREE TO</b>. Think you hate spam? I hate it more, and I won't do it.
</ul>
{include file="new_user_form.tpl"}
{/if}
</div>
</div>

</body>
</html>