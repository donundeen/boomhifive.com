{include file="header.tpl"}

<br clear="all">
<div class="page_title" id="page_title">
<em class="a">this is the</em> <em class="b">{$CITY_NAME}</em> <em class="c">Band Family Tree</em> <em class="a">[revived]</em>
</div>



<div class="everything">

<div class="leftbar">
{$SHORT_NAME} Stats:
<BR>
{$index->entity_count.band} Bands (<a href='all_entities.php?type=band'>See All Bands</a>)
<BR>
{$index->entity_count.musician} Musicians (<a href='all_entities.php?type=musician'>See All Musicians</a>)
<BR>
{$index->entity_count.venue} Venues (<a href='all_entities.php?type=venue'>See All Venues</a>)
<BR>
{$index->entity_count.event} Events (<a href='all_entities.php?type=event'>See All Events</a>)
<hr>
New Stuff! (since {$index->new_date_string})
<BR>
New Bands:<BR>
<ul class=connection>
{foreach from=$index->new_entities.band item=new_entity}
<li><a href="entity.php?type=band&id={$new_entity.ID}">{$new_entity.name}</a></li>
{/foreach}
</ul>
New Musicians:<BR>
<ul class=connection>
{foreach from=$index->new_entities.musician item=new_entity}
<li><a href="entity.php?type=musician&id={$new_entity.ID}">{$new_entity.name}</a></li>
{/foreach}
</ul>
New Venues:<BR>
<ul class=connection>
{foreach from=$index->new_entities.venue item=new_entity}
<li><a href="entity.php?type=venue&id={$new_entity.ID}">{$new_entity.name}</a></li>
{/foreach}
</ul>
New Events:<BR>
<ul class=connection>
{foreach from=$index->new_entities.event item=new_entity}
<li><a href="entity.php?type=event&id={$new_entity.ID}">{$new_entity.name}</a></li>
{/foreach}
</ul>

<hr>
New Articles:
<ul class=connection>
{foreach from=$index->new_articles item=article}
<li class=connection>the {$article.entity_type} <a href='entity.php?type={$article.entity_type}&id={$article.entity_ID}'>{$article.entity_name}</a></li>
{/foreach}
</ul>
<hr>
New Files:
<ul class=connection>
{foreach from=$index->new_files item=file}
<li class=connection>the {$file.entity_type} <a href='entity.php?type={$file.entity_type}&id={$file.entity_ID}'>{$file.entity_name}</a></li>
{/foreach}
</ul>

</div>
<div class="middle">

<div class="articles">

<i class="metatext">Hey everyone, remember this? If you played in bands in Gainesville in the 90s->early 00s, you probably knew about the Gainesville Band Family Tree. It went down about 15 years ago, but I found the code, stood it up on a webserver, and have made just enough changes to a) get it to work and b) disable new contributions. Everything else on this site is how it looked in 2005 or so when I took it down. I hope you enjoy cruising it again. Parts are probably broken, email me if you see a bug. -- Don</i> 



It is with great excitement and trepidation that I<BR>
Welcome you to the Latest Version of the {$CITY_NAME} Band Family Tree!
<ul>
<li>My apologies, while I iron out the details, for:
<ul>
<li>Parts of the site that aren't explained, well or at all. I'll be 
getting to that very soon.</li>
<li>The crappy layout in IE. Any CSS gods wanna give me a hand? </li>
<li>Any bugs I haven't fixed yet. I'm sure there are a lot.</li>
</ul>
</li>
<li><b>Please</b>report problems to <a 
href='mailto:donundeen@yahoo.com'>donundeen@yahoo.com</a></li>
<li><b>Introduction</b>: The {$CITY_NAME} Band Family Tree (hereafter known as The {$SHORT_NAME}) is a listing of every Band, Musician, and Venue in {$CITY_NAME}, {$STATE_NAME}. <B>EVER</B>.</li>
<li><B>OBVIOUSLY</B>, it's not now, nor will it ever be, entirely complete. But if you look at the stats on the left, we're doing pretty good. </li>
<li>The <b>{$SHORT_NAME}</b> is added to and built by people like <b>YOU</b>, every day, adding bands, musicians, and venues to the Tree. It's fast and easy to contribute; and <b>NOW</b>, with the new software in place, your changes are seen by everyone, immediately. </li>
<li>The <b>{$SHORT_NAME}</b> is <b>MORE</b> than just a dry relational database that shows who played in what band when, and what clubs they played in. </li>
<li>If you see something that looks <B>WRONG</b>, then it's <B>your fault</b>, and it's your job to <b>fix</b> it. Hopefully I've made that easy to do.
<li>The <b>HEART</b> of the <b>{$SHORT_NAME}</b> is the <B>ARTICLES</b>, which  anyone can submit (no membership BS required). Articles are any story you can remember about that band, musician, or venue; the more personal, the better. Every band, musician, and venue has their own articles page. You can also upload <B>FILES</b>, like pictures and MP3's, on each article page.
<li>The real <b>POINT</b> of all this is not to be a weblog, or a band promo site, but rather to write a hypertext webumentary about the {$CITY_NAME} <B>MUSIC SCENE</b>, a story that reads differently for evey person that enters it, a story that we're all contributing to all the time.</li>
</ul>
</div>



</div>



<!--
<div class="rightbar">
rightbar
</div>
-->
</div>


</body>
</html>
