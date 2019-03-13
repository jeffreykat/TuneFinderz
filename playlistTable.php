<?php
include('session.php');

$pidt = $_POST['pid'];
$query = "SELECT M.song_id, M.title, M.artist_name, M.terms, M.song_hotttnesss FROM `music_data` M, `song_playlist` P WHERE P.song_id = M.song_id AND P.playlist_id = $pidt";
$result = mysqli_query($mysqli,$query);
echo "<input type='hidden' name='delete-id' value='$pidt'/>";
while($row = mysqli_fetch_array($result)){
  $sidt = $row["song_id"];
  $popularity = floatval($row["song_hotttnesss"]) * 10.0;
  echo "<tr><td><button type='button' class='btn' value='$pidt' id='$sidt' onclick=deleteSong('$sidt')><i class='fa fa-trash'></i></button></td><td>" . $row["title"] . "</td><td>" . $row["artist_name"] . "</td><td>" . $row["terms"] . "</td><td>" . $popularity . "</td></tr>";
}
?>