<?php /* Smarty version 2.6.9, created on 2006-12-05 19:12:49
         compiled from event_join_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'event_join_list.tpl', 35, false),)), $this); ?>

<ul class=connection>
<?php $_from = $this->_tpl_vars['entity']->join_info['event']['approved']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['info']):
 if ($this->_tpl_vars['TIME_NOW'] <= $this->_tpl_vars['info']['start_date']): ?>
<li class=connection><a href="<?php echo $this->_tpl_vars['php_self']; ?>
?type=event&id=<?php echo $this->_tpl_vars['info']['event_ID']; ?>
"><?php if ($this->_tpl_vars['info']['name'] == ''): ?>Show<?php else:  echo $this->_tpl_vars['info']['name'];  endif; ?></a> <BR>
(<?php echo $this->_tpl_vars['info']['start_date']; ?>
 <?php echo $this->_tpl_vars['info']['start_time']; ?>
) <br>
@ <a href="<?php echo $this->_tpl_vars['PHP_SELF']; ?>
?type=venue&id=<?php echo $this->_tpl_vars['info']['venue_ID']; ?>
"><?php echo $this->_tpl_vars['info']['venue_name']; ?>
</a>


 <BR>
 <em class='y'>
With 
<?php $_from = $this->_tpl_vars['info']['all_bands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['event_band_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['event_band_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['band']):
        $this->_foreach['event_band_list']['iteration']++;
?>
<a href='<?php echo $this->_tpl_vars['PHP_SELF']; ?>
?type=band&id=<?php echo $this->_tpl_vars['band']['band_ID']; ?>
'><?php echo $this->_tpl_vars['band']['band_name']; ?>
</a><?php if (! ($this->_foreach['event_band_list']['iteration'] == $this->_foreach['event_band_list']['total'])): ?>, <?php endif;  endforeach; endif; unset($_from); ?>
<BR></em>



<?php if ($this->_tpl_vars['entity']->type == 'musician'): ?>
<BR>
<em class='y'>
(<?php echo $this->_tpl_vars['entity']->info['name']; ?>
's in 
<?php if ($this->_tpl_vars['info']['num_bands'] == '1'): ?>
<a href='<?php echo $this->_tpl_vars['PHP_SELF']; ?>
?type=band&id=<?php echo $this->_tpl_vars['info']['band_ID']; ?>
'><?php echo $this->_tpl_vars['info']['band_name']; ?>
</a>
<?php elseif ($this->_tpl_vars['info']['num_bands'] > 1):  $_from = $this->_tpl_vars['info']['musician_bands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['musician_event_band_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['musician_event_band_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['band']):
        $this->_foreach['musician_event_band_list']['iteration']++;
?>
<a href='<?php echo $this->_tpl_vars['PHP_SELF']; ?>
?type=band&id=<?php echo $this->_tpl_vars['band']['band_ID']; ?>
'><?php echo $this->_tpl_vars['band']['band_name']; ?>
</a><?php if (! ($this->_foreach['musician_event_band_list']['iteration'] == $this->_foreach['musician_event_band_list']['total'])): ?>, <?php endif;  endforeach; endif; unset($_from);  endif; ?>)
</em>
<?php endif; ?>
<BR>
<em class='y'>
<i><?php echo ((is_array($_tmp=@$this->_tpl_vars['entity']->join_num_articles['event'][$this->_tpl_vars['id']])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
 articles</i> 
<i><?php echo ((is_array($_tmp=@$this->_tpl_vars['entity']->join_num_files['event'][$this->_tpl_vars['id']])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
 files</i>
</em>

</li>
<?php endif; ?>

<?php endforeach; endif; unset($_from); ?> 


</ul>
<ul class=connection>
<?php $_from = $this->_tpl_vars['entity']->join_info['event']['new']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['info']):
 if ($this->_tpl_vars['TIME_NOW'] <= $this->_tpl_vars['info']['start_date']): ?>
<li class=connection><i>new!</i><a href="<?php echo $this->_tpl_vars['php_self']; ?>
?type=event&id=<?php echo $this->_tpl_vars['info']['event_ID']; ?>
"><?php if ($this->_tpl_vars['info']['name'] == ''): ?>Show<?php else:  echo $this->_tpl_vars['info']['name'];  endif; ?></a><BR>
 (<?php echo $this->_tpl_vars['info']['start_date']; ?>
 <?php echo $this->_tpl_vars['info']['start_time']; ?>
) <BR>
 @ <a href="<?php echo $this->_tpl_vars['PHP_SELF']; ?>
?type=venue&id=<?php echo $this->_tpl_vars['info']['venue_ID']; ?>
"><?php echo $this->_tpl_vars['info']['venue_name']; ?>
</a>
 
 <BR>
 <em class='y'>
With 
<?php $_from = $this->_tpl_vars['info']['all_bands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['event_band_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['event_band_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['band']):
        $this->_foreach['event_band_list']['iteration']++;
?>
<a href='<?php echo $this->_tpl_vars['PHP_SELF']; ?>
?type=band&id=<?php echo $this->_tpl_vars['band']['band_ID']; ?>
'><?php echo $this->_tpl_vars['band']['band_name']; ?>
</a><?php if (! ($this->_foreach['event_band_list']['iteration'] == $this->_foreach['event_band_list']['total'])): ?>, <?php endif;  endforeach; endif; unset($_from); ?>
<BR></em>

 
 <?php if ($this->_tpl_vars['entity']->type == 'musician'): ?>
 <BR>
 <em class='y'>
(<?php echo $this->_tpl_vars['entity']->info['name']; ?>
's in 
 <?php if ($this->_tpl_vars['info']['num_bands'] == '1'): ?>
 <a href='<?php echo $this->_tpl_vars['PHP_SELF']; ?>
?type=band&id=<?php echo $this->_tpl_vars['info']['band_ID']; ?>
'><?php echo $this->_tpl_vars['info']['band_name']; ?>
</a>
 <?php elseif ($this->_tpl_vars['info']['num_bands'] > 1): ?>
 <?php $_from = $this->_tpl_vars['info']['musician_bands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['musician_event_band_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['musician_event_band_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['band']):
        $this->_foreach['musician_event_band_list']['iteration']++;
?>
 <a href='<?php echo $this->_tpl_vars['PHP_SELF']; ?>
?type=band&id=<?php echo $this->_tpl_vars['band']['band_ID']; ?>
'><?php echo $this->_tpl_vars['band']['band_name']; ?>
</a><?php if (! ($this->_foreach['musician_event_band_list']['iteration'] == $this->_foreach['musician_event_band_list']['total'])): ?>, <?php endif; ?>
 <?php endforeach; endif; unset($_from); ?>
 <?php endif; ?>)
 <em>
 <?php endif; ?>

 
 <BR>
 <i><?php echo ((is_array($_tmp=@$this->_tpl_vars['entity']->join_num_articles['event'][$this->_tpl_vars['id']])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
 articles</i> 
<i><?php echo ((is_array($_tmp=@$this->_tpl_vars['entity']->join_num_files['event'][$this->_tpl_vars['id']])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
 files</i>
</li>
<?php endif;  endforeach; endif; unset($_from); ?>
</ul>

<hr>
<ul class=connection>
<b class="entity_join_list_name">Past Events :</b>
<?php $_from = $this->_tpl_vars['entity']->join_info['event']['approved']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['info']):
 if ($this->_tpl_vars['TIME_NOW'] > $this->_tpl_vars['info']['start_date']): ?>
<li class=connection><a href="<?php echo $this->_tpl_vars['php_self']; ?>
?type=event&id=<?php echo $this->_tpl_vars['info']['event_ID']; ?>
"><?php if ($this->_tpl_vars['info']['name'] == ''): ?>Show<?php else:  echo $this->_tpl_vars['info']['name'];  endif; ?></a> <BR>
(<?php echo $this->_tpl_vars['info']['start_date']; ?>
 <?php echo $this->_tpl_vars['info']['start_time']; ?>
) <BR>
<?php if ($this->_tpl_vars['entity']->type != 'venue'): ?>
@ <a href="<?php echo $this->_tpl_vars['PHP_SELF']; ?>
?type=venue&id=<?php echo $this->_tpl_vars['info']['venue_ID']; ?>
"><?php echo $this->_tpl_vars['info']['venue_name']; ?>
</a><BR>
<?php endif; ?>
 

<em class='y'>
With 
<?php $_from = $this->_tpl_vars['info']['all_bands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['event_band_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['event_band_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['band']):
        $this->_foreach['event_band_list']['iteration']++;
?>
<a href='<?php echo $this->_tpl_vars['PHP_SELF']; ?>
?type=band&id=<?php echo $this->_tpl_vars['band']['band_ID']; ?>
'><?php echo $this->_tpl_vars['band']['band_name']; ?>
</a><?php if (! ($this->_foreach['event_band_list']['iteration'] == $this->_foreach['event_band_list']['total'])): ?>, <?php endif;  endforeach; endif; unset($_from); ?>
</em>

 
 
<?php if ($this->_tpl_vars['entity']->type == 'musician'): ?>
<em class='y'>
(<?php echo $this->_tpl_vars['entity']->info['name']; ?>
's in 
<?php if ($this->_tpl_vars['info']['num_bands'] == '1'): ?>
<a href='<?php echo $this->_tpl_vars['PHP_SELF']; ?>
?type=band&id=<?php echo $this->_tpl_vars['info']['band_ID']; ?>
'><?php echo $this->_tpl_vars['info']['band_name']; ?>
</a>
<?php elseif ($this->_tpl_vars['info']['num_bands'] > 1):  $_from = $this->_tpl_vars['info']['musician_bands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['musician_event_band_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['musician_event_band_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['band']):
        $this->_foreach['musician_event_band_list']['iteration']++;
?>
<a href='<?php echo $this->_tpl_vars['PHP_SELF']; ?>
?type=band&id=<?php echo $this->_tpl_vars['band']['band_ID']; ?>
'><?php echo $this->_tpl_vars['band']['band_name']; ?>
</a><?php if (! ($this->_foreach['musician_event_band_list']['iteration'] == $this->_foreach['musician_event_band_list']['total'])): ?>, <?php endif;  endforeach; endif; unset($_from);  endif; ?>
)</em>
 <?php endif; ?>
 <BR>
<em class='y'>
<i><?php echo ((is_array($_tmp=@$this->_tpl_vars['entity']->join_num_articles['event'][$this->_tpl_vars['id']])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
 articles</i> 
<i><?php echo ((is_array($_tmp=@$this->_tpl_vars['entity']->join_num_files['event'][$this->_tpl_vars['id']])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
 files</i>
</em>
</li>
<?php endif; ?>

<?php endforeach; endif; unset($_from); ?> 
</ul>
<ul class=connection>
<?php $_from = $this->_tpl_vars['entity']->join_info['event']['new']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['info']):
 if ($this->_tpl_vars['TIME_NOW'] > $this->_tpl_vars['info']['start_date']): ?>
<li class=connection><i>new!</i><a href="<?php echo $this->_tpl_vars['php_self']; ?>
?type=event&id=<?php echo $this->_tpl_vars['info']['event_ID']; ?>
"><?php if ($this->_tpl_vars['info']['name'] == ''): ?>Show<?php else:  echo $this->_tpl_vars['info']['name'];  endif; ?></a><BR>
 (<?php echo $this->_tpl_vars['info']['start_date']; ?>
 <?php echo $this->_tpl_vars['info']['start_time']; ?>
) <BR>
 <?php if ($this->_tpl_vars['entity']->type != 'venue'): ?>
 @ <a href="<?php echo $this->_tpl_vars['PHP_SELF']; ?>
?type=venue&id=<?php echo $this->_tpl_vars['info']['venue_ID']; ?>
"><?php echo $this->_tpl_vars['info']['venue_name']; ?>
</a>
 <?php endif; ?>
<BR> 
<em class='y'>
With 
<?php $_from = $this->_tpl_vars['info']['all_bands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['event_band_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['event_band_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['band']):
        $this->_foreach['event_band_list']['iteration']++;
?>
<a href='<?php echo $this->_tpl_vars['PHP_SELF']; ?>
?type=band&id=<?php echo $this->_tpl_vars['band']['band_ID']; ?>
'><?php echo $this->_tpl_vars['band']['band_name']; ?>
</a><?php if (! ($this->_foreach['event_band_list']['iteration'] == $this->_foreach['event_band_list']['total'])): ?>, <?php endif;  endforeach; endif; unset($_from); ?>
</em>
 
 <?php if ($this->_tpl_vars['entity']->type == 'musician'): ?>
 <BR><em class='y'>
 (<?php echo $this->_tpl_vars['entity']->info['name']; ?>
's in 
 <?php if ($this->_tpl_vars['info']['num_bands'] == '1'): ?>
 <a href='<?php echo $this->_tpl_vars['PHP_SELF']; ?>
?type=band&id=<?php echo $this->_tpl_vars['info']['band_ID']; ?>
'><?php echo $this->_tpl_vars['info']['band_name']; ?>
</a>
 <?php elseif ($this->_tpl_vars['info']['num_bands'] > 1): ?>
 <?php $_from = $this->_tpl_vars['info']['musician_bands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['musician_event_band_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['musician_event_band_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['band']):
        $this->_foreach['musician_event_band_list']['iteration']++;
?>
 <a href='<?php echo $this->_tpl_vars['PHP_SELF']; ?>
?type=band&id=<?php echo $this->_tpl_vars['band']['band_ID']; ?>
'><?php echo $this->_tpl_vars['band']['band_name']; ?>
</a><?php if (! ($this->_foreach['musician_event_band_list']['iteration'] == $this->_foreach['musician_event_band_list']['total'])): ?>, <?php endif; ?>
 <?php endforeach; endif; unset($_from); ?>
 <?php endif; ?>)
 </em>
 <?php endif; ?>
 <BR>
 <em class='y'>
<i><?php echo ((is_array($_tmp=@$this->_tpl_vars['entity']->join_num_articles['event'][$this->_tpl_vars['id']])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
 articles</i> 
<i><?php echo ((is_array($_tmp=@$this->_tpl_vars['entity']->join_num_files['event'][$this->_tpl_vars['id']])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
 files</i>
</em>
</li>
<?php endif;  endforeach; endif; unset($_from); ?>
</ul>