<?php /* Smarty version 2.6.9, created on 2006-04-26 19:21:06
         compiled from blocked_ips.tpl */ ?>
<form method=post action='<?php echo $this->_tpl_vars['PHP_SELF']; ?>
'>
<input type=hidden name=action value='insert_blocked_ip'>
Block IP:
<input type=text size=15 name='blocked_ip[ip_address]'>
<input type=submit name=submit value=submit>
</form>


<BR>
<table border=1>
<tr>
<td colspan=3>Blocked IPs</td>
</tr>
<td>ID</td>
<td>IP Address</td>
<td>Delete</td>
</tr>
<?php $_from = $this->_tpl_vars['blocked_ips']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ip']):
?>
<tr>
<td><?php echo $this->_tpl_vars['ip']['blocked_ip_id']; ?>
</td>
<td><?php echo $this->_tpl_vars['ip']['ip_address']; ?>
</td>
<td><a href='<?php echo $this->_tpl_vars['PHP_SELF']; ?>
?action=delete_blocked_ip&blocked_ip_id=<?php echo $this->_tpl_vars['ip']['blocked_ip_id']; ?>
'>Delete</a></td>
</tr>

<?php endforeach; endif; unset($_from); ?>
</table>