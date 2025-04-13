<?php
/* Smarty version 3.1.34-dev-7, created on 2025-04-13 22:18:56
  from '/Users/donundeen/Documents/htdocs/boomhifive.com/gbft/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_67fc3850b44de6_16154128',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '234f16032356837d8b2298aad936d13c6b648d51' => 
    array (
      0 => '/Users/donundeen/Documents/htdocs/boomhifive.com/gbft/templates/index.tpl',
      1 => 1637360197,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_67fc3850b44de6_16154128 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<br clear="all">
<div class="page_title" id="page_title">
<em class="a">this is the</em> <em class="b"><?php echo $_smarty_tpl->tpl_vars['CITY_NAME']->value;?>
</em> <em class="c">Band Family Tree</em> <em class="a">[revived]</em>
</div>



<div class="everything">

<div class="leftbar">
<?php echo $_smarty_tpl->tpl_vars['SHORT_NAME']->value;?>
 Stats:
<BR>
<?php echo $_smarty_tpl->tpl_vars['index']->value->entity_count['band'];?>
 Bands (<a href='all_entities.php?type=band'>See All Bands</a>)
<BR>
<?php echo $_smarty_tpl->tpl_vars['index']->value->entity_count['musician'];?>
 Musicians (<a href='all_entities.php?type=musician'>See All Musicians</a>)
<BR>
<?php echo $_smarty_tpl->tpl_vars['index']->value->entity_count['venue'];?>
 Venues (<a href='all_entities.php?type=venue'>See All Venues</a>)
<BR>
<?php echo $_smarty_tpl->tpl_vars['index']->value->entity_count['event'];?>
 Events (<a href='all_entities.php?type=event'>See All Events</a>)
<hr>
New Stuff! (since <?php echo $_smarty_tpl->tpl_vars['index']->value->new_date_string;?>
)
<BR>
New Bands:<BR>
<ul class=connection>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['index']->value->new_entities['band'], 'new_entity');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['new_entity']->value) {
?>
<li><a href="entity.php?type=band&id=<?php echo $_smarty_tpl->tpl_vars['new_entity']->value['ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['new_entity']->value['name'];?>
</a></li>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul>
New Musicians:<BR>
<ul class=connection>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['index']->value->new_entities['musician'], 'new_entity');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['new_entity']->value) {
?>
<li><a href="entity.php?type=musician&id=<?php echo $_smarty_tpl->tpl_vars['new_entity']->value['ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['new_entity']->value['name'];?>
</a></li>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul>
New Venues:<BR>
<ul class=connection>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['index']->value->new_entities['venue'], 'new_entity');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['new_entity']->value) {
?>
<li><a href="entity.php?type=venue&id=<?php echo $_smarty_tpl->tpl_vars['new_entity']->value['ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['new_entity']->value['name'];?>
</a></li>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul>
New Events:<BR>
<ul class=connection>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['index']->value->new_entities['event'], 'new_entity');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['new_entity']->value) {
?>
<li><a href="entity.php?type=event&id=<?php echo $_smarty_tpl->tpl_vars['new_entity']->value['ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['new_entity']->value['name'];?>
</a></li>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul>

<hr>
New Articles:
<ul class=connection>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['index']->value->new_articles, 'article');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
?>
<li class=connection>the <?php echo $_smarty_tpl->tpl_vars['article']->value['entity_type'];?>
 <a href='entity.php?type=<?php echo $_smarty_tpl->tpl_vars['article']->value['entity_type'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['article']->value['entity_ID'];?>
'><?php echo $_smarty_tpl->tpl_vars['article']->value['entity_name'];?>
</a></li>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul>
<hr>
New Files:
<ul class=connection>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['index']->value->new_files, 'file');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['file']->value) {
?>
<li class=connection>the <?php echo $_smarty_tpl->tpl_vars['file']->value['entity_type'];?>
 <a href='entity.php?type=<?php echo $_smarty_tpl->tpl_vars['file']->value['entity_type'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['file']->value['entity_ID'];?>
'><?php echo $_smarty_tpl->tpl_vars['file']->value['entity_name'];?>
</a></li>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul>

</div>
<div class="middle">

<div class="articles">

<i class="metatext">[Hey everyone, remember this? If you played in bands in Gainesville in the 90s->early 00s, you probably knew about the Gainesville Band Family Tree. It went down about 15 years ago, but I found the code, stood it up on a webserver, and have made just enough changes to a) get it to work and b) disable new contributions. Everything else on this site is how it looked in 2005 or so when I took it down. I hope you enjoy cruising it again. Parts are probably broken, email me if you see a bug. -- Don]</i>
<BR><BR>



It is with great excitement and trepidation that I<BR>
Welcome you to the Latest Version of the <?php echo $_smarty_tpl->tpl_vars['CITY_NAME']->value;?>
 Band Family Tree!
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
<li><b>Introduction</b>: The <?php echo $_smarty_tpl->tpl_vars['CITY_NAME']->value;?>
 Band Family Tree (hereafter known as The <?php echo $_smarty_tpl->tpl_vars['SHORT_NAME']->value;?>
) is a listing of every Band, Musician, and Venue in <?php echo $_smarty_tpl->tpl_vars['CITY_NAME']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['STATE_NAME']->value;?>
. <B>EVER</B>.</li>
<li><B>OBVIOUSLY</B>, it's not now, nor will it ever be, entirely complete. But if you look at the stats on the left, we're doing pretty good. </li>
<li>The <b><?php echo $_smarty_tpl->tpl_vars['SHORT_NAME']->value;?>
</b> is added to and built by people like <b>YOU</b>, every day, adding bands, musicians, and venues to the Tree. It's fast and easy to contribute; and <b>NOW</b>, with the new software in place, your changes are seen by everyone, immediately. </li>
<li>The <b><?php echo $_smarty_tpl->tpl_vars['SHORT_NAME']->value;?>
</b> is <b>MORE</b> than just a dry relational database that shows who played in what band when, and what clubs they played in. </li>
<li>If you see something that looks <B>WRONG</b>, then it's <B>your fault</b>, and it's your job to <b>fix</b> it. Hopefully I've made that easy to do.
<li>The <b>HEART</b> of the <b><?php echo $_smarty_tpl->tpl_vars['SHORT_NAME']->value;?>
</b> is the <B>ARTICLES</b>, which  anyone can submit (no membership BS required). Articles are any story you can remember about that band, musician, or venue; the more personal, the better. Every band, musician, and venue has their own articles page. You can also upload <B>FILES</b>, like pictures and MP3's, on each article page.
<li>The real <b>POINT</b> of all this is not to be a weblog, or a band promo site, but rather to write a hypertext webumentary about the <?php echo $_smarty_tpl->tpl_vars['CITY_NAME']->value;?>
 <B>MUSIC SCENE</b>, a story that reads differently for evey person that enters it, a story that we're all contributing to all the time.</li>
</ul>



<h2>Cool Data Visualizations!</h2>
In 2003 I made some force-directed graph visualizations of all the bands and musicians in the GBFT. <br>
I printed them up at 24"x36" and sold them to Common Grounds for $150 in bar tab.<BR>
Don't know what happened to them, but here is a <a href="https://undeen.com/gbft/graphs/">folder</a> holding the original (large) files, in jpg, svg, and ai formats.
<BR><BR>
Feel free to download, modify, print, and share. I think they look pretty cool.

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
<?php }
}
