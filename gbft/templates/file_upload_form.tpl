<form enctype="multipart/form-data" method=post action='entity.php' class="hideable">
<input type=hidden name=action value='add_file'>
  <input type=hidden name="submitted_files[entity_type]" value='{$entity->type}'>
  <input type=hidden name="submitted_files[entity_ID]" value='{$entity->id}'>
  <input type=hidden name="type" value='{$entity->type}'>
  <input type=hidden name="id" value='{$entity->id}'>
  <input type="hidden" name="MAX_FILE_SIZE" value="15000000">
  <B>Your name:</b><input type=text name='submitted_files[submitter_name]' size=15>
			<Br>
  <b>Select File by clicking "Browse"</b><Br>
  <input type=file name='submitted_files[userfile]'>
				    <BR>
  <B>Description:</b><BR>
  <textarea name='submitted_files[description]' cols=25 rows=3></textarea>
<BR>
  <input type=submit name="SUBMIT" value="Upload File"><Br>
  <font size=-1>Sometimes it takes a while, so please be patient</font>
  </form>