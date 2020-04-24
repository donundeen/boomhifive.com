<?php /* Smarty version 2.6.9, created on 2006-04-17 11:41:43
         compiled from index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<br clear="all">
<div class="page_title" id="page_title">
<em class="a">this is the</em> <em class="b"><?php echo $this->_tpl_vars['CITY_NAME']; ?>
</em> <em class="c">Band Family Tree</em>
</div>



<div class="everything">

<div class="leftbar">
<?php echo $this->_tpl_vars['SHORT_NAME']; ?>
 Stats:
<BR>
<?php echo $this->_tpl_vars['index']->entity_count['band']; ?>
 Bands (<a href='all_entities.php?type=band'>See All Bands</a>)
<BR>
<?php echo $this->_tpl_vars['index']->entity_count['musician']; ?>
 Musicians (<a href='all_entities.php?type=musician'>See All Musicians</a>)
<BR>
<?php echo $this->_tpl_vars['index']->entity_count['venue']; ?>
 Venues (<a href='all_entities.php?type=venue'>See All Venues</a>)
<BR>
<?php echo $this->_tpl_vars['index']->entity_count['event']; ?>
 Events (<a href='all_entities.php?type=event'>See All Events</a>)
<hr>
New Stuff! (since <?php echo $this->_tpl_vars['index']->new_date_string; ?>
)
<BR>
New Bands:<BR>
<ul class=connection>
<?php $_from = $this->_tpl_vars['index']->new_entities['band']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['new_entity']):
?>
<li><a href="entity.php?type=band&id=<?php echo $this->_tpl_vars['new_entity']['ID']; ?>
"><?php echo $this->_tpl_vars['new_entity']['name']; ?>
</a></li>
<?php endforeach; endif; unset($_from); ?>
</ul>
New Musicians:<BR>
<ul class=connection>
<?php $_from = $this->_tpl_vars['index']->new_entities['musician']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['new_entity']):
?>
<li><a href="entity.php?type=musician&id=<?php echo $this->_tpl_vars['new_entity']['ID']; ?>
"><?php echo $this->_tpl_vars['new_entity']['name']; ?>
</a></li>
<?php endforeach; endif; unset($_from); ?>
</ul>
New Venues:<BR>
<ul class=connection>
<?php $_from = $this->_tpl_vars['index']->new_entities['venue']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['new_entity']):
?>
<li><a href="entity.php?type=venue&id=<?php echo $this->_tpl_vars['new_entity']['ID']; ?>
"><?php echo $this->_tpl_vars['new_entity']['name']; ?>
</a></li>
<?php endforeach; endif; unset($_from); ?>
</ul>
New Events:<BR>
<ul class=connection>
<?php $_from = $this->_tpl_vars['index']->new_entities['event']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['new_entity']):
?>
<li><a href="entity.php?type=event&id=<?php echo $this->_tpl_vars['new_entity']['ID']; ?>
"><?php echo $this->_tpl_vars['new_entity']['name']; ?>
</a></li>
<?php endforeach; endif; unset($_from); ?>
</ul>

<hr>
New Articles:
<ul class=connection>
<?php $_from = $this->_tpl_vars['index']->new_articles; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
<li class=connection>the <?php echo $this->_tpl_vars['article']['entity_type']; ?>
 <a href='entity.php?type=<?php echo $this->_tpl_vars['article']['entity_type']; ?>
&id=<?php echo $this->_tpl_vars['article']['entity_ID']; ?>
'><?php echo $this->_tpl_vars['article']['entity_name']; ?>
</a></li>
<?php endforeach; endif; unset($_from); ?>
</ul>
<hr>
New Files:
<ul class=connection>
<?php $_from = $this->_tpl_vars['index']->new_files; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['file']):
?>
<li class=connection>the <?php echo $this->_tpl_vars['file']['entity_type']; ?>
 <a href='entity.php?type=<?php echo $this->_tpl_vars['file']['entity_type']; ?>
&id=<?php echo $this->_tpl_vars['file']['entity_ID']; ?>
'><?php echo $this->_tpl_vars['file']['entity_name']; ?>
</a></li>
<?php endforeach; endif; unset($_from); ?>
</ul>

</div>
<div class="middle">

<div class="articles">

It is with great excitement and trepidation that I<BR>
Welcome you to the Latest Version of the <?php echo $this->_tpl_vars['CITY_NAME']; ?>
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
<li><b>Introduction</b>: The <?php echo $this->_tpl_vars['CITY_NAME']; ?>
 Band Family Tree (hereafter known as The <?php echo $this->_tpl_vars['SHORT_NAME']; ?>
) is a listing of every Band, Musician, and Venue in <?php echo $this->_tpl_vars['CITY_NAME']; ?>
, <?php echo $this->_tpl_vars['STATE_NAME']; ?>
. <B>EVER</B>.</li>
<li><B>OBVIOUSLY</B>, it's not now, nor will it ever be, entirely complete. But if you look at the stats on the left, we're doing pretty good. </li>
<li>The <b><?php echo $this->_tpl_vars['SHORT_NAME']; ?>
</b> is added to and built by people like <b>YOU</b>, every day, adding bands, musicians, and venues to the Tree. It's fast and easy to contribute; and <b>NOW</b>, with the new software in place, your changes are seen by everyone, immediately. </li>
<li>The <b><?php echo $this->_tpl_vars['SHORT_NAME']; ?>
</b> is <b>MORE</b> than just a dry relational database that shows who played in what band when, and what clubs they played in. </li>
<li>If you see something that looks <B>WRONG</b>, then it's <B>your fault</b>, and it's your job to <b>fix</b> it. Hopefully I've made that easy to do.
<li>The <b>HEART</b> of the <b><?php echo $this->_tpl_vars['SHORT_NAME']; ?>
</b> is the <B>ARTICLES</b>, which  anyone can submit (no membership BS required). Articles are any story you can remember about that band, musician, or venue; the more personal, the better. Every band, musician, and venue has their own articles page. You can also upload <B>FILES</b>, like pictures and MP3's, on each article page.
<li>The real <b>POINT</b> of all this is not to be a weblog, or a band promo site, but rather to write a hypertext webumentary about the <?php echo $this->_tpl_vars['CITY_NAME']; ?>
 <B>MUSIC SCENE</b>, a story that reads differently for evey person that enters it, a story that we're all contributing to all the time.</li>
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