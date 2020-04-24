<form class="hideable" method=post action={$PHP_SELF}>
<input type=hidden name=action value=register_user>
<input type=hidden name="return_page" value='{$return_page}'>
Your Username:
<input type=text name='name' value='{$submitted_name}' size=20>
<br>
Your Email Address:
<input type=text name='email_address' value='{$submitted_email_address}' size=20>
<br>
Password:
<input type=password name='password' size=20>
<BR>
Confirm Password:
<input type=password name='password_confirm' size=20>
<BR>
<input type=submit name=submit value=register>
</form>