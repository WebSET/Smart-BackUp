<?php
$ver = "1.0.0";
function checkversion(){
$data = array();
$url = "http://www.webset.ro/EasyBackup/get.php";
$page = fopen($url, 'r');
$content = "";
while( !feof( $page ) ) {
$buffer = trim( fgets( $page, 4096 ) );
$content .= $buffer;
}

$start = "<version>";
$end = "<\/version>";

preg_match( "/$start(.*)$end/s", $content, $match);

$version = $match[1];

$data[1] = $version;

$start = "<url>";
$end = "<\/url>";

preg_match( "/$start(.*)$end/s", $content, $match);

$url = $match[1];
$data[2] = $url;

return $data;

}
$data = array();
$data = checkversion();
if($ver != $data[1])
{
/*$message = "'There is a new version of the script please update it !'";
echo '<script type="text/javascript">Urgent('.$message.')</script>';*/
$update = true;
$url_update = $data[2]; 
}
?>