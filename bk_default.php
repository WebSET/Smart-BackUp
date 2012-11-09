<? print '<ul id="main-list">';
		show_backup_list();
		print '</ul>';
?>
<? 
print 'Or upload file (wait for the next version)';
echo'
<form action="" method="post">
<input type="file" name="default_db" value="" />
<input type="submit"  name="submit" value="Set" disabled="disabled" />
</form>';
?>