<?php
if (!isset($_SESSION)) {
	session_start();
}
include("../bk_config.php");
include("./function.inc.php");

$installpassword = $_POST['installpassword'];
$password = md5($installpassword);
$installdbname = $_POST['installdbname'];
$installdbuser = $_POST['installdbuser'];
$installdbpass = $_POST['installdbpass'];
$installdbhost = $_POST['installdbhost'];

$sourcefolder = "../";
$destfolder = "../";
$filename = "bk_config.php";
$linearray = array(1,2,3,4,5,6);
$contentarray[0] = "\$bk_db_name = \"$installdbname\";\n";
$contentarray[1] = "\$bk_db_user = \"$installdbuser\";\n";
$contentarray[2] = "\$bk_db_pass = \"$installdbpass\";\n";
$contentarray[3] = "\$bk_db_host = \"$installdbhost\";\n";
$contentarray[4] = "\$default_db = \"\";\n";
$contentarray[5] = "\$admin_pass = \"$password\";\n";

copyandmodifyfile($sourcefolder,$destfolder,$filename,$filename,$linearray,$contentarray);
/*
$conn = mysql_connect($installdbhost,$installdbuser,$installdbpass);
mysql_select_db($installdbname);

if(!isset($tempdumpquery))
	{
		$tempdumpquery = NULL;
	}
$dumpfile = file("default.sql");
	for ($i=0;$i<=count($dumpfile);$i++){
		if(isset($dumpfile[$i]))
		{
			$tempdumpquery .= $dumpfile[$i];
		}
	}
$dumpquery = explode(";",$tempdumpquery);
	for ($i=0;$i<=count($dumpquery);$i++){
		if(isset($dumpquery[$i])) {
			mysql_query($dumpquery[$i],$conn);
		}
	}  



$sql = "insert into backup_admin (password) values ('$installpassword')";
mysql_query($sql,$conn);
mysql_close($conn);

*/

?>
<html>
<head>
<title>Finish</title>
<link rel="stylesheet" href="style/style.css" type="text/css">
</head>

<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td align="center" valign="top">       
      <hr width="90%" size="1" noshade>
      <table width="90%" border="0" cellspacing="0" cellpadding="4" height="300">
        <tr> 
          <td align="center"> 
           <p><a href="../bk_index.php">Login Administrator</a></p>
          </td>
        </tr>
      </table>
      
    </td>
  </tr>
  <tr>
    <td align="center" valign="top" height="40">&nbsp;</td>
  </tr>
</table>
</body>
</html>
