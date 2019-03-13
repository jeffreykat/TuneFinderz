<?php
include('session.php');

if(isset($_POST['gen-rand-btn'])){
  $title = mysqli_real_escape_string($mysqli,$_POST['rand-name']);
  $genre = isset($_POST['rand-genre']) ? $_POST['rand-genre'] : "pop";
  $len = isset($_POST['rand-len']) ? $_POST['rand-len'] : 5;
  $pid;
  if(empty($title)){
    $err = "Playlist name is empty";
  }
  else {
    $song = "INSERT INTO `playlists`(`pname`, `username`) VALUES ('$title','$login_session');";
    
    for($i = 0; $i < $len; $i++){
      $song .= "INSERT INTO song_playlist(playlist_id, song_id) SELECT playlists.playlist_id, music_data.song_id FROM playlists, music_data WHERE playlists.pname = '$title' AND music_data.terms LIKE '%$genre%' ORDER BY RAND() LIMIT 1;";
    }
    mysqli_multi_query($mysqli, $song);
    header("location: index.php");
  }
}

if(isset($_POST['create-new-btn'])){
  $title = mysqli_real_escape_string($mysqli,$_POST['create-name']);
  if(empty($title)){
    $err = "Playlist name is empty";
  }
  else {
    $sql = "INSERT INTO `playlists`(`pname`, `username`) VALUES ('$title','$login_session')";
    mysqli_query($mysqli,$sql);
    header("location: index.php");
  }
}

if(isset($_POST['delete-playlist-btn'])){
  $id = mysqli_real_escape_string($mysqli,$_POST['delete-id']);
  $deleteSql = "DELETE FROM song_playlist  WHERE song_playlist.playlist_id = $id;";
  $deleteSql .= "DELETE FROM playlists WHERE playlist_id=$id";
  mysqli_multi_query($mysqli, $deleteSql);
  header("location: index.php");
}
?>

  <html>
  <meta charset="UTF-8">
  <title>TuneFinderz</title>

  <head>
    <?php /*variables*/
        $sitepath="http://people.oregonstate.edu/~jeffreyk/tunefinderz/";
        $author="Katherine Jeffrey";
  ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="shortcut icon" href="stylesheets/favicon.ico" type="image/x-icon">-->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:700|Poppins" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="tunecontrol.js"></script>
    <link rel="stylesheet" href="tunefinderz.css" media="screen">

  </head>

  <body>
    <div class="layout-container">
      <header>
        <h1 id="page-head">
          Playlist Generator
        </h1>
      </header>
      <nav>
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="" id="nav-user"><span class="glyphicon glyphicon-user"></span> <?php echo $login_session; ?></a></li>
              <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
          </div>
        </div>
      </nav>
      <main class="grid-container">
        <aside class="itemM">
          <div id="playlists">
            <p id="playlists-title">
              Playlists
            </p>
            <form action="" id="playlist-menu" method="post">
              <div class="list-group">
                <?php
            $sql = "SELECT playlist_id, pname, (SELECT Count(song_id) FROM `song_playlist` WHERE playlists.playlist_id = song_playlist.playlist_id) FROM `playlists` WHERE username = '$login_session'";
            $result = mysqli_query($mysqli,$sql);
            while($row = mysqli_fetch_array($result)){
              $pid = $row["playlist_id"];
              $name = $row["pname"];
              $length = $row["(SELECT Count(song_id) FROM `song_playlist` WHERE playlists.playlist_id = song_playlist.playlist_id)"];
              echo "<button type='button' name='playlist-select' class='list-group-item' value='$name' id='$pid' onclick=displayPlaylists('$pid')> $name <span class='badge'>$length</span></button>";
            }
            ?>
              </div>
            </form>
          </div>
        </aside>
        <div class="itemC">
          <div id="rand-section" class="well section">
            <p class="section-title">
              Generate a Random Playlist
            </p>
            <p class="err">
              <?php echo $error; ?>
            </p>
            <form action="" id="form-gen-rand" method="post">
              <div class="form-group">
                <label for="rand-name">Playlist Name:</label>
                <input type="text" class="form-control section-input" id="rand-name" name="rand-name">
              </div>
              <div class="form-group">
                <p class="section-p">
                  Select Your Preferred Genre:
                </p>
                <label class="checkbox-inline"><input type="radio" name="rand-genre" value="pop">Pop</label>
                <label class="checkbox-inline"><input type="radio" name="rand-genre" value="rock">Rock</label>
                <label class="checkbox-inline"><input type="radio" name="rand-genre" value="dance">Dance</label>
                <label class="checkbox-inline"><input type="radio" name="rand-genre" value="jazz">Jazz</label>
                <label class="checkbox-inline"><input type="radio" name="rand-genre" value="country">Country</label>
                <label class="checkbox-inline"><input type="radio" name="rand-genre" value="folk">Folk</label>
                <label class="checkbox-inline"><input type="radio" name="rand-genre" value="hip hop">Hip Hop</label>
              </div>
              <div class="form-group">
                <label for="sel1">Select Playlist Length:</label>
                <select class="form-control section-input" id="sel1" name="rand-len">
            <option value="5">5 songs</option>
            <option value="10">10 songs</option>
            <option value = 15>15 songs</option>
            <option value="20">20 songs</option>
            <option value="8">Random</option>
          </select>
              </div>
              <input type="submit" name="gen-rand-btn" class="btn btn-default" value="Generate" />
            </form>
          </div>
          <div id="create-section" class="well section">
            <p class="section-title">
              Create a Playlist
            </p>
            <p class="err">
              <?php echo $error; ?>
            </p>
            <form action="" method="post" id="form-create">
              <div class="form-group">
                <label for="rand-name">Playlist Name:</label>
                <input type="text" class="form-control section-input" id="rand-name" name="create-name">
              </div>
              <input type="submit" name="create-new-btn" class="btn btn-default" value="Create" />
            </form>
          </div>
          <div id="edit-section" class="well section">
            <span id="close-edit"><a onclick="hidePlaylists()"><i class="fa fa-close"></i></a></span>
            <p id="edit-title" class="section-title">
              Edit
            </p>
            <form action="" id="edit-playlist-form" method="post">
              <table id="playlist-edit-table" class="table table-hover">
                <thead>
                  <tr>
                    <th></th>
                    <th>Song</th>
                    <th>Artist</th>
                    <th>Genre</th>
                    <th>Popularity</th>
                  </tr>
                </thead>
                <tbody id="table-body">
                  <tr></tr>
                </tbody>
              </table>
              <input type="button" onclick="showAddSongs()" name="show-songs-btn" id="show-songs-btn" class="btn btn-default" value="Add Songs" />
              <input type="submit" name="delete-playlist-btn" class="btn btn-default" value="Delete Playlist" />
            </form>
            <form action="" id="add-songs-form" method="post">
              <p class="section-title">
                Add Songs
              </p>
              <span>Filter: </span>
              <div class="form-group">
                <select class="add-song-select form-control" id="selGenre" name="song-genre">
                <option value="">Genre</option>
                <option value="pop">Pop</option>
                <option value="rock">Rock</option>
                <option value="dance">Dance</option>
                <option value="folk">Folk</option>
                <option value="jazz">Jazz</option>
                  <option value="country">Country</option>
                <option value="hip hop">Hip Hop</option>
              </select>
                <select class="add-song-select form-control" id="selPop" name="song-pop">
                  <option value="">Popularity</option>
                  <option value="0">0</option>
                  <option value="5">0-5</option>
                  <option value="6">5-10</option>
                  <option value="10">10+</option>
                </select>
                <select class="add-song-select form-control" id="selLoc" name="song-loc">
                  <option value="">Location</option>
                  <option value="CA">California</option>
                  <option value="UK">England</option>
                  <option value="NY">New York</option>
                  <option value="Mexico">Mexico</option>
                  <option value="Africa">Africa</option>
                  <option value="AU">Australia</option>
                  <option value="TN">Tennessee</option>
                </select>
                <input type="button" onclick="filterSongs()" name="filter-btn" id="filter-btn" class="btn btn-default" value="Search"/>
              </div>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th></th>
                    <th>Song</th>
                    <th>Artist</th>
                    <th>Genre</th>
                    <th>Popularity</th>
                  </tr>
                </thead>
                <tbody id="add-table-body">
                  <tr></tr>
                </tbody>
              </table>
            </form>
          </div>
        </div>
      </main>
      <footer id="footer">TuneFinderz</footer>
    </div>
  </body>

  <script src="tunecontrol.js"></script>

  </html>