<?php
include('session.php');

$sid = $_POST['sid'];
$pid = $_POST['pid'];
$addq = "INSERT INTO `song_playlist`(`playlist_id`, `song_id`) VALUES ('$pid','$sid')";
mysqli_query($mysqli,$addq);
echo "$pid";

?>