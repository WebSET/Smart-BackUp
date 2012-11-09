<? 
if (!isset($_SESSION)) {
	session_start();
}

require("bk_config.php");
$curpage = $_SERVER["REQUEST_URI"];

if(!empty($_POST['loginform']))
{
	if($admin_pass == md5($_POST["pass"]))
	{
	$loginuser = "admin";
	$_SESSION["loginuser"] = "admin";
	}
}


if (!isset($_SESSION['loginuser'])) { // we are not logged in, show login form
	echo  '
	<div id="admin_style" align="center"><form method="post" action="'.$curpage.'" class="login">
		
		<div>	<label>Password: </label></div>
			<input type="password" id="pass" name="pass" />
			<br />
		
		
		<br />
			<input type="submit" name="save" value="Login" class="button" />
			
				
			
		
		<input type="hidden" name="loginform" value="loginform" />
		
	</form></div>';
	exit;
} else  { // we are logged in, show logout form



	//header("Location: bk_index.php");
	
	

 }
?>