<?php
include("../bk_config.php");
if (!(is_writeable("../bk_config.php"))){
print "Please set the permision to bk_config.php to writeable!";
exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Setup</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body bgcolor="#FFFFFF">
<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0">
<form action="install_1.php" method="POST">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td align="center" valign="top"> 
      <hr width="90%" size="1" noshade>
      <table width="90%" border="0" cellspacing="0" cellpadding="4" height="300">
        <tr> 
          <td align="center"> 
           
            <table width="300" border="0" cellspacing="1" cellpadding="4" bgcolor="#F2F2F2">
              <tr bgcolor="#FFFFFF"> 
                <td width="83">Database :</td>
                <td width="198"><input type="text" name="installdbname" value=""></td>
              </tr>
              <tr bgcolor="#FFFFFF"> 
                <td>User :</td>
                <td><input type="text" name="installdbuser" value="root"></td>
              </tr>
              <tr bgcolor="#FFFFFF"> 
                <td>Password :</td>
                <td><input type="password" name="installdbpass"></td>
              </tr>
              <tr bgcolor="#FFFFFF"> 
                <td>Host :</td>
                <td><input type="text" name="installdbhost" value="localhost"></td>
              </tr>
              <tr bgcolor="#FFFFFF"> 
                <td colspan="2" align="center"><h2><p>Administrator</p></h2></td>                
              </tr>
              <tr bgcolor="#FFFFFF"> 
                <td>Password :</td>
                <td><input type="password" name="installpassword" value=""></td>
              </tr>
              <tr bgcolor="#FFFFFF"> 
                <td>&nbsp;</td>
                <td><input type="submit" name="Submit" value="Setup"></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
      
    </td>
  </tr>
  <tr>
    <td align="center" valign="top" height="40">&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>
