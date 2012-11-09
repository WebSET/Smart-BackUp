<? 

if($bk_db_name == " " || $bk_db_host == " " || $bk_db_user == " ") 
{
	$message = "'Please setup the database first before you use the script!'";
	echo '<script type="text/javascript">Warning_Error('.$message.')</script>';
}


?>