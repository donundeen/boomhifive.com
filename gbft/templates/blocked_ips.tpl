<form method=post action='{$PHP_SELF}'>
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
{foreach from=$blocked_ips item=ip}
<tr>
<td>{$ip.blocked_ip_id}</td>
<td>{$ip.ip_address}</td>
<td><a href='{$PHP_SELF}?action=delete_blocked_ip&blocked_ip_id={$ip.blocked_ip_id}'>Delete</a></td>
</tr>

{/foreach}
</table>