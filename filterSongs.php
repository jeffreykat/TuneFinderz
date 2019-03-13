<?php
include('session.php');

$genre = isset($_POST['g']) ? $_POST['g'] : "";
$popularity = isset($_POST['p']) ? $_POST['p'] : "";
$location = isset($_POST['loc']) ? $_POST['loc'] : "";
$pidt = isset($_POST['pid']) ? $_POST['pid'] : "";

if($popularity == "0"){
  $popMin = -0.1;
  $popMax = 0.0;
}
if($popularity == "5"){
  $popMin = 0.0;
  $popMax = 0.6;
}
if($popularity == "6"){
  $popMin = 0.5;
  $popMax = 0.10;
}
if($popularity == "10"){
  $popMin = 0.10;
  $popMax = 0.15;
}
if($location == "CA"){
  $secondaryLoc = "California";
}
if($location == "UK"){
  $secondaryLoc = "England";
}
if($location == "NY"){
  $secondaryLoc = "New York";
}
if($location == "Mexico"){
  $secondaryLoc = "Tijuana";
}
if($location == "Africa"){
  $secondaryLoc = "Egypt";
}
if($location == "AU"){
  $secondaryLoc = "Australia";
}
if($location == "TN"){
  $secondaryLoc = "Tennessee";
}

$queryGenre = "SELECT song_id, title, artist_name, terms, song_hotttnesss FROM `music_data` WHERE terms LIKE '%$genre%' ORDER BY artist_name ASC";
$queryPopularity = "SELECT song_id, title, artist_name, terms, song_hotttnesss FROM `music_data` WHERE song_hotttnesss > $popMin AND song_hotttnesss < $popMax ORDER BY artist_name ASC";
$queryLocation = "SELECT song_id, title, artist_name, terms, song_hotttnesss FROM `music_data` WHERE location LIKE '%$location%' OR location LIKE '%$secondaryLoc%' ORDER BY artist_name ASC";
$queryGenrePopularity = "SELECT song_id, title, artist_name, terms, song_hotttnesss FROM `music_data` WHERE terms LIKE '%$genre%' AND song_hotttnesss > $popMin AND song_hotttnesss < $popMax ORDER BY artist_name ASC";
$queryGenreLocation = "SELECT song_id, title, artist_name, terms, song_hotttnesss FROM `music_data` WHERE terms LIKE '%$genre%' AND (location LIKE '%$location%' OR location LIKE '%$secondaryLoc%') ORDER BY artist_name ASC";
$queryPopularityLocation = "SELECT song_id, title, artist_name, terms, song_hotttnesss FROM `music_data` WHERE song_hotttnesss > $popMin AND song_hotttnesss < $popMax AND (location LIKE '%$location%' OR location LIKE '%$secondaryLoc%') ORDER BY artist_name ASC";
$queryAll = "SELECT song_id, title, artist_name, terms, song_hotttnesss FROM `music_data` WHERE terms LIKE '%$genre%' AND (song_hotttnesss > $popMin AND song_hotttnesss < $popMax) AND (location LIKE '%$location%' OR location LIKE '%$secondaryLoc%') ORDER BY artist_name ASC";

//Only genre set
if($genre != '' && $popularity == '' && $location == ''){
  $result = mysqli_query($mysqli,$queryGenre);
  while($row = mysqli_fetch_array($result)){
    $sidt = $row["song_id"];
    $sname = $row["title"];
    $artist = $row["artist_name"];
    $gterms = $row["terms"];
    $popfloat = floatval($row["song_hotttnesss"]) * 10.0;
    echo "<tr><td><button type='button' class='btn' value='$pidt' id='$sidt' onclick=addSong('$sidt')><i class='fa fa-plus'></i></button></td><td>$sname</td><td>$artist</td><td>$gterms</td><td>$popfloat</td></tr>";
  }
}

//Only popularity set
if($genre == '' && $popularity != '' && $location == ''){
  $result = mysqli_query($mysqli,$queryPopularity);
  while($row = mysqli_fetch_array($result)){
    $sidt = $row["song_id"];
    $sname = $row["title"];
    $artist = $row["artist_name"];
    $gterms = $row["terms"];
    $popfloat = floatval($row["song_hotttnesss"]) * 10.0;
    echo "<tr><td><button type='button' class='btn' value='$pidt' id='$sidt' onclick=addSong('$sidt')><i class='fa fa-plus'></i></button></td><td>$sname</td><td>$artist</td><td>$gterms</td><td>$popfloat</td></tr>";
  }
}

//Only location set
if($genre == '' && $popularity == '' && $location != ''){
  $result = mysqli_query($mysqli,$queryLocation);
  while($row = mysqli_fetch_array($result)){
    $sidt = $row["song_id"];
    $sname = $row["title"];
    $artist = $row["artist_name"];
    $gterms = $row["terms"];
    $popfloat = floatval($row["song_hotttnesss"]) * 10.0;
    echo "<tr><td><button type='button' class='btn' value='$pidt' id='$sidt' onclick=addSong('$sidt')><i class='fa fa-plus'></i></button></td><td>$sname</td><td>$artist</td><td>$gterms</td><td>$popfloat</td></tr>";
  }
}

//Genre and popularity set
if($genre != '' && $popularity != '' && $location == ''){
  $result = mysqli_query($mysqli,$queryGenrePopularity);
  while($row = mysqli_fetch_array($result)){
    $sidt = $row["song_id"];
    $sname = $row["title"];
    $artist = $row["artist_name"];
    $gterms = $row["terms"];
    $popfloat = floatval($row["song_hotttnesss"]) * 10.0;
    echo "<tr><td><button type='button' class='btn' value='$pidt' id='$sidt' onclick=addSong('$sidt')><i class='fa fa-plus'></i></button></td><td>$sname</td><td>$artist</td><td>$gterms</td><td>$popfloat</td></tr>";
  }
}

//Genre and location set
if($genre != '' && $popularity == '' && $location != ''){
  $result = mysqli_query($mysqli,$queryGenreLocation);
  while($row = mysqli_fetch_array($result)){
    $sidt = $row["song_id"];
    $sname = $row["title"];
    $artist = $row["artist_name"];
    $gterms = $row["terms"];
    $popfloat = floatval($row["song_hotttnesss"]) * 10.0;
    echo "<tr><td><button type='button' class='btn' value='$pidt' id='$sidt' onclick=addSong('$sidt')><i class='fa fa-plus'></i></button></td><td>$sname</td><td>$artist</td><td>$gterms</td><td>$popfloat</td></tr>";
  }
}

//Popularity and location set
if(empty($genre) && !empty($popularity) && !empty($location)){
  $result = mysqli_query($mysqli,$queryPopularityLocation);
  while($row = mysqli_fetch_array($result)){
    $sidt = $row["song_id"];
    $sname = $row["title"];
    $artist = $row["artist_name"];
    $gterms = $row["terms"];
    $popfloat = floatval($row["song_hotttnesss"]) * 10.0;
    echo "<tr><td><button type='button' class='btn' value='$pidt' id='$sidt' onclick=addSong('$sidt')><i class='fa fa-plus'></i></button></td><td>$sname</td><td>$artist</td><td>$gterms</td><td>$popfloat</td></tr>";
  }
}

//All set
if($genre != '' && $popularity != '' && $location != ''){
  $queryTest = "SELECT song_id, title, artist_name, terms, song_hotttnesss FROM `music_data` WHERE terms LIKE '%pop%' AND song_hotttnesss > 0.0 AND song_hotttnesss < 0.5 AND (location LIKE '%UK%' OR location LIKE '%England%') ORDER BY artist_name ASC";
  $result = mysqli_query($mysqli,$queryAll);
  while($row = mysqli_fetch_array($result)){
    $sidt = $row["song_id"];
    $sname = $row["title"];
    $artist = $row["artist_name"];
    $gterms = $row["terms"];
    $popfloat = floatval($row["song_hotttnesss"]) * 10.0;
    echo "<tr><td><button type='button' class='btn' value='$pidt' id='$sidt' onclick=addSong('$sidt')><i class='fa fa-plus'></i></button></td><td>$sname</td><td>$artist</td><td>$gterms</td><td>$popfloat</td></tr>";
  }
}

?>