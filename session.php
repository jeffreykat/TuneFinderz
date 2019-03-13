<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = mysqli_connect("classmysql.engr.oregonstate.edu", "cs440_voraru", "0583", "cs440_voraru");
if(!$mysqli || $msqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
header("Last-Modified: " . gmdate("D, d M Y H:i:s", time()-10) . " GMT");
header("Expires: " . gmdate("D, d M Y H:i:s", time() + 5) . " GMT");
header("Pragma: no-cache");
header("Cache-Control: max-age=1, s-maxage=1, no-cache, must-revalidate");
session_cache_limiter("nocache");
session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($mysqli,"select username from users where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }

?>