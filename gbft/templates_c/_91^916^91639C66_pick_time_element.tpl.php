<?php /* Smarty version 2.6.9, created on 2006-04-17 11:38:55
         compiled from pick_time_element.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'string_format', 'pick_time_element.tpl', 9, false),)), $this); ?>
<select name=<?php echo $this->_tpl_vars['element_name']; ?>
time_hour>
<?php unset($this->_sections['hour']);
$this->_sections['hour']['start'] = (int)0;
$this->_sections['hour']['name'] = 'hour';
$this->_sections['hour']['loop'] = is_array($_loop=24) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['hour']['show'] = true;
$this->_sections['hour']['max'] = $this->_sections['hour']['loop'];
$this->_sections['hour']['step'] = 1;
if ($this->_sections['hour']['start'] < 0)
    $this->_sections['hour']['start'] = max($this->_sections['hour']['step'] > 0 ? 0 : -1, $this->_sections['hour']['loop'] + $this->_sections['hour']['start']);
else
    $this->_sections['hour']['start'] = min($this->_sections['hour']['start'], $this->_sections['hour']['step'] > 0 ? $this->_sections['hour']['loop'] : $this->_sections['hour']['loop']-1);
if ($this->_sections['hour']['show']) {
    $this->_sections['hour']['total'] = min(ceil(($this->_sections['hour']['step'] > 0 ? $this->_sections['hour']['loop'] - $this->_sections['hour']['start'] : $this->_sections['hour']['start']+1)/abs($this->_sections['hour']['step'])), $this->_sections['hour']['max']);
    if ($this->_sections['hour']['total'] == 0)
        $this->_sections['hour']['show'] = false;
} else
    $this->_sections['hour']['total'] = 0;
if ($this->_sections['hour']['show']):

            for ($this->_sections['hour']['index'] = $this->_sections['hour']['start'], $this->_sections['hour']['iteration'] = 1;
                 $this->_sections['hour']['iteration'] <= $this->_sections['hour']['total'];
                 $this->_sections['hour']['index'] += $this->_sections['hour']['step'], $this->_sections['hour']['iteration']++):
$this->_sections['hour']['rownum'] = $this->_sections['hour']['iteration'];
$this->_sections['hour']['index_prev'] = $this->_sections['hour']['index'] - $this->_sections['hour']['step'];
$this->_sections['hour']['index_next'] = $this->_sections['hour']['index'] + $this->_sections['hour']['step'];
$this->_sections['hour']['first']      = ($this->_sections['hour']['iteration'] == 1);
$this->_sections['hour']['last']       = ($this->_sections['hour']['iteration'] == $this->_sections['hour']['total']);
?>
<option value='<?php echo $this->_sections['hour']['index']; ?>
' <?php if ($this->_tpl_vars['value_hour'] == $this->_sections['hour']['index']): ?>SELECTED<?php endif; ?>><?php if ($this->_sections['hour']['index'] >= 12): ?>p.m. <?php if ($this->_sections['hour']['index'] == 12): ?>12<?php else:  echo $this->_sections['hour']['index']-12;  endif;  else: ?>a.m. <?php if ($this->_sections['hour']['index'] == 0): ?>12<?php else:  echo $this->_sections['hour']['index'];  endif;  endif; ?></option>
<?php endfor; endif; ?>
</select>
:
<select name=<?php echo $this->_tpl_vars['element_name']; ?>
time_minute>
<?php unset($this->_sections['minute']);
$this->_sections['minute']['name'] = 'minute';
$this->_sections['minute']['loop'] = is_array($_loop=60) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['minute']['start'] = (int)0;
$this->_sections['minute']['show'] = true;
$this->_sections['minute']['max'] = $this->_sections['minute']['loop'];
$this->_sections['minute']['step'] = 1;
if ($this->_sections['minute']['start'] < 0)
    $this->_sections['minute']['start'] = max($this->_sections['minute']['step'] > 0 ? 0 : -1, $this->_sections['minute']['loop'] + $this->_sections['minute']['start']);
else
    $this->_sections['minute']['start'] = min($this->_sections['minute']['start'], $this->_sections['minute']['step'] > 0 ? $this->_sections['minute']['loop'] : $this->_sections['minute']['loop']-1);
if ($this->_sections['minute']['show']) {
    $this->_sections['minute']['total'] = min(ceil(($this->_sections['minute']['step'] > 0 ? $this->_sections['minute']['loop'] - $this->_sections['minute']['start'] : $this->_sections['minute']['start']+1)/abs($this->_sections['minute']['step'])), $this->_sections['minute']['max']);
    if ($this->_sections['minute']['total'] == 0)
        $this->_sections['minute']['show'] = false;
} else
    $this->_sections['minute']['total'] = 0;
if ($this->_sections['minute']['show']):

            for ($this->_sections['minute']['index'] = $this->_sections['minute']['start'], $this->_sections['minute']['iteration'] = 1;
                 $this->_sections['minute']['iteration'] <= $this->_sections['minute']['total'];
                 $this->_sections['minute']['index'] += $this->_sections['minute']['step'], $this->_sections['minute']['iteration']++):
$this->_sections['minute']['rownum'] = $this->_sections['minute']['iteration'];
$this->_sections['minute']['index_prev'] = $this->_sections['minute']['index'] - $this->_sections['minute']['step'];
$this->_sections['minute']['index_next'] = $this->_sections['minute']['index'] + $this->_sections['minute']['step'];
$this->_sections['minute']['first']      = ($this->_sections['minute']['iteration'] == 1);
$this->_sections['minute']['last']       = ($this->_sections['minute']['iteration'] == $this->_sections['minute']['total']);
?>
<option value='<?php echo $this->_sections['minute']['index']; ?>
' <?php if ($this->_tpl_vars['value_minute'] == $this->_sections['minute']['index']): ?>SELECTED<?php endif; ?>><?php echo ((is_array($_tmp=$this->_sections['minute']['index'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%02s") : smarty_modifier_string_format($_tmp, "%02s")); ?>
</option>
<?php endfor; endif; ?>
</select>