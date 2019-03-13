<?php
include('session.php');

$sid = $_POST['sid'];
$pid = $_POST['pid'];
$deleteq = "DELETE FROM `song_playlist` WHERE playlist_id = '$pid' AND song_id = '$sid'";
mysqli_query($mysqli,$deleteq);
echo "$pid";

?>