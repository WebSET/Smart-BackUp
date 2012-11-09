<?php
if (!isset($_SESSION)) {
	session_start();
}
//DEBUG
//error_reporting(0);
//DEBUG
//Don't change
$update = false;
$url_update = "#";
//Administrator check
require("./checkuser.php");
//Configure
require("bk_config.php");
//Functions  
require("functions/functions.php");

if (!isset($_GET['do'])) {
 $do = "";
}
else
{
	$do = $_GET['do'];
}

if (!isset($_GET['backup_file'])) {
 $backup_file = "";
}
else
{
	$backup_file = $_GET['backup_file'];
}

if(!isset($_GET['remove']))
{
	$remove = "";
}
else 
{
	$remove = $_GET['remove'];
	unlink('backup/'.$remove);
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Easy Backup & Restore System</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="./images/style.css" type="text/css" rel="stylesheet" />
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<link rel='shortcut icon' href='images/favicon.ico' type='image/x-icon'/ >
        <script type="text/javascript" src="js/jquery-1.3.2.js"></script>
        <script type="text/javascript" src="js/jquery.jcorners.js"></script>
        <script type="text/javascript" src="js/jquery.notify.js"></script>
        <link rel="stylesheet" type="text/css" href="js/notify.css" />
<!-- The HTML5 Shim is required for older browsers, mainly older versions IE -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
  <!--[if lt IE 7]>
    <div style=' clear: both; text-align:center; position: relative;'>
    	<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" alt="" /></a>
    </div>
  <![endif]-->
     <script type="text/javascript">
            $(function(){
                $(".eventtest").click(function(){
                    alert("click through!");
                });
            });
        </script>
        <script type="text/javascript">
		function Information(message)
		{
				$.notify({
			text:message,
		    title:'Information',
			icon:'images/dialog-information.png'
			});
		}
			function Urgent(message)
		{
				$.notify({
			text:message,
		    title:'Information',
			icon:'images/dialog-warning.png'
			});
		}
		   function Successful(message)
{
		$.notify({
			text:message,
		    title:'Successful',
			icon:'images/dialog-information.png'
			});
				    }
			 function Warning_Error(message)
{
		$.notify({
			text:message,
		    title:'Warning',
			icon:'images/dialog-warning.png'
			});
				    }
        </script>

</head>
<body>
<? require("functions/update.php"); ?>
<? require('bk_errors.php'); ?>
<div id="container">
	<header id="header">
		<a href="bk_index.php"><img src="images/bk_img.png" width="128" height="128" border="0"></a><div class="text_header"><h1>Easy Backup System (WSBackup)</h1><p>Version 1.0.0</p></div>
	</header>
    <section>
    <div class="box">
    
<?

switch($do)
{
	case "restore_default":
		restore_database($bk_db_host, $bk_db_user,$bk_db_pass,$bk_db_name,$default_db);
		include_once("bk_menu.php");
	break;
	case "backup_quick":
		backup_tables($bk_db_host, $bk_db_user,$bk_db_pass,$bk_db_name,$tables = '*');
		include_once("bk_menu.php");
	break;
	case "backup_list":
		print '<ul id="main-list">';
		show_backup_list();
		print '</ul>';
	break;
	case "delete_database":
	    delete_database($bk_db_host, $bk_db_user,$bk_db_pass,$bk_db_name);
		include_once("bk_menu.php");
	break;
	case "restore_backup":
		restore_database($bk_db_host, $bk_db_user,$bk_db_pass,$bk_db_name,$backup_file);
		include_once("bk_menu.php");
	break;
	case "set_default":
		if(!isset($_GET['default_file']))
		{
		include_once("bk_default.php");
		}
		else
		{
			set_default($_GET['default_file']);
			include_once("bk_menu.php");
		}
	break;
	default:
		include_once("bk_menu.php");
		
	break;
}
?>
    </div>
    <div class="clear"></div>
    </section>

</div>


</body>
</html>
