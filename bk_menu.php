<ul id="main-menu"> 
<? if($bk_db_name == " " || $bk_db_host == " " || $bk_db_user == " ")
{
	echo '<li><a href="#"><div class="chat icons"></div><span class="section">Setup</span><span class="description">Setup Database</span></a></li>';
}
if ($update == true)
{
	echo '<li><a href="'.$url_update.'"><div class="chat icons"><img src="images/software-update-urgent.png" width="48" height="48" border="0" alt=""></div><span class="section">Update</span><span class="description">Update to a newer version</span></a></li>';
}
?>
<li>
	<a href="?do=set_default">
		<div class="chat icons"><img src="images/setdb.png" width="48" height="48" border="0" alt=""></div>
		<span class="section">Set Default</span>
		<span class="description">Set the default database for restore</span>
	</a>
</li>
<li>
	<a href="?do=restore_default">
		<div class="chat icons"><img src="images/database.png" width="48" height="48" border="0" alt="" /></div>
		<span class="section">Default</span>
		<span class="description">Restore default database</span>
	</a>
</li>
<li>
	<a href="?do=backup_quick">
		<div class="chat icons"><img src="images/dbplus.png" width="48" height="48" border="0" alt="" /></div>
		<span class="section">Quick</span>
		<span class="description">Quick Backup</span>
	</a>
</li>
<li>
	<a href="?do=delete_database">
		<div class="chat icons"><img src="images/edit-clear.png" width="48" height="48" border="0" alt="" /></div>
		<span class="section">Clear</span>
		<span class="description">Quick Delete</span>
	</a>
</li>
<li>
	<a href="?do=backup_list">
		<div class="chat icons"><img src="images/database_4_48.png" width="48" height="48" border="0" alt="" /></div>
		<span class="section">List</span>
		<span class="description">Show the backups done so far</span>
	</a>
</li>
</ul>