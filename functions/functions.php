<?
function db_name() {
      return ($bk_db_name);
  }
  
function db_connect() {
    $db_connection = mysql_connect($bk_db_host, $bk_db_user,$bk_db_pass);
    return $db_connection;
}  

function check_user()
{
	if($_SESSION["admin"]!=$password)
	{
		die("Please login again!");
	}
}



function restore_database($bk_db_host, $bk_db_user,$bk_db_pass,$bk_db_name,$database_file)
{
	if($_GET['do'] == 'restore_default')
	{
		if($database_file == "")
		{
			$message = "'Please set the default database first!'";
			echo '<script type="text/javascript">Urgent('.$message.')</script>';
			exit();
		}
		if(!file_exists($database_file))
		{
			$message = "'Please set another default file!'";
			echo '<script type="text/javascript">Urgent('.$message.')</script>';
			exit();
		}
	}
	
	$message = "'Please be patience , this may take a few seconds!'";
	echo '<script type="text/javascript">Information('.$message.')</script>';
	
	$conn = mysql_connect($bk_db_host, $bk_db_user, $bk_db_pass) or die ('Error connecting to mysql');
	mysql_select_db($bk_db_name);
	
	if(!isset($tempdumpquery))
	{
		$tempdumpquery = NULL;
	}
	$dumpfile = file("./backup/".$database_file);
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
	$message = "'The default database was set successfully!'";
	echo '<script type="text/javascript">Successful('.$message.')</script>';
}

function delete_database($bk_db_host, $bk_db_user,$bk_db_pass,$bk_db_name)
{ 

	$message = "'Please be patience , this may take a few seconds!'";
	echo '<script type="text/javascript">Information('.$message.')</script>';
	
	$conn = mysql_connect($bk_db_host, $bk_db_user, $bk_db_pass) or die ('Error connecting to mysql');
	mysql_select_db($bk_db_name);
	
	$tables = array();
    $result = mysql_query('SHOW TABLES');
    while($row = mysql_fetch_row($result))
    {
      $tables[] = $row[0];
    }
	foreach($tables as $table)
  {  
   $sql = 'DROP TABLE IF EXISTS '.$table.'';
    mysql_query($sql);
  }
	
	//mysql_query($dumpquery[$i],$conn);
		
	$message = "'The database is now clear!'";
	echo '<script type="text/javascript">Successful('.$message.')</script>';
}

function backup_tables($host,$user,$pass,$name,$tables = '*')
{
	$message = "'Please be patience , this may take a few seconds!'";
	echo '<script type="text/javascript">Information('.$message.')</script>';
  
  $link = mysql_connect($host,$user,$pass);
  mysql_select_db($name,$link);
  $return = '';
  
  //get all of the tables
  if($tables == '*')
  {
    $tables = array();
    $result = mysql_query('SHOW TABLES');
    while($row = mysql_fetch_row($result))
    {
      $tables[] = $row[0];
    }
  }
  else
  {
    $tables = is_array($tables) ? $tables : explode(',',$tables);
  }
  
  //cycle through
  foreach($tables as $table)
  {
    $result = mysql_query('SELECT * FROM '.$table);
    $num_fields = mysql_num_fields($result);
	
   $return .= 'DROP TABLE IF EXISTS '.$table.';';
   // $return = 'DROP TABLE IF EXISTS '.$table.';';
	
    $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
    $return.= "\n\n".$row2[1].";\n\n";
    
    for ($i = 0; $i < $num_fields; $i++) 
    {
      while($row = mysql_fetch_row($result))
      {
        $return.= 'INSERT INTO '.$table.' VALUES(';
        for($j=0; $j<$num_fields; $j++) 
        {
          $row[$j] = addslashes($row[$j]);
          $row[$j] = ereg_replace("\n","\\n",$row[$j]);
          if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
          if ($j<($num_fields-1)) { $return.= ','; }
        }
        $return.= ");\n";
      }
    }
    $return.="\n\n\n";
  }
  
  //save file
//  $handle = fopen('db-backup-'.time().'-'.(implode(',',$tables)).'.sql','w+');
	$handle = fopen('./backup/db-backup-'.date("Y-m-d_H-i-s").'.sql','w+');
  fwrite($handle,$return);
  fclose($handle);
  
  	$message = "'The backup was created with the name : '";
	echo '<script type="text/javascript">Successful('.$message.')</script>';
  
}

function show_backup_list()
{



/**

 * Change the path to your folder.

 *

 * This must be the full path from the root of your

 * web space. If you're not sure what it is, ask your host.

 *

 * Name this file index.php and place in the directory.

 */



    // Define the full path to your folder from root

    $path = "backup";



    // Open the folder

    $dir_handle = @opendir($path) or die("Unable to open $path");



    // Loop through the files

    while ($file = readdir($dir_handle)) {



    if($file == "." || $file == ".." || $file == "bk_index.php" )

//backup/$file

        continue;
	print '<li>';
       print  '<span class="name">'.$file.'</span>';
	   print '<span class="box_information"><span class="information"></span></span>';
	   print '<a href="?do=set_default&default_file='.$file.'"><span class="set_default">Set Default</span></a>';
	   print '<a href="backup/'.$file.'"> <span class="save">Save</span></a>';
	   print '<a href="?do=backup_list&remove='.$file.'"><span class="delete">Delete</span></a>';
	   print '<a href="?do=restore_backup&backup_file='.$file.'"><span class="restore">Restore</span></a>';
	print '</li>';


    }



    // Close

    closedir($dir_handle);


}
function set_default($file_db)
{
$line=5; //includes zero as 1.
$newdata='$default_db = "'.$file_db.'";';
$data=file('bk_config.php');
$data[$line]=$newdata."\r\n";
$data=implode($data);
file_put_contents('bk_config.php',$data);
}
?>