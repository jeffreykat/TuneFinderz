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

//$_SERVER["REQUEST_METHOD"] == "POST"

if(isset($_POST['login_user'])) {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($mysqli,$_POST['username']);
      $mypassword = mysqli_real_escape_string($mysqli,$_POST['pwd']); 
      
      $sql = "SELECT * FROM `users` WHERE username = '$myusername' AND password = '$mypassword'";
      $result = mysqli_query($mysqli,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: index.php");
      }else {
         $error = "Your Username or Password is not recognized";
      }
   }
if(isset($_POST['register_user'])){
      $myusername = mysqli_real_escape_string($mysqli,$_POST['username']);
      $mypassword = mysqli_real_escape_string($mysqli,$_POST['pwd']); 
      $confirm = mysqli_real_escape_string($mysqli,$_POST['pwd_conf']); 
  
      $err = 0;
  
  if(empty($myusername)){
    $error = "Username is required";
    $err = 1;
  }
  if(empty($mypassword)){
    $error = "Password is required";
    $err = 2;
  }
  if($mypassword != $confirm){
    $error = "Passwords do not match";
    $err = 3;
  }
      
      $sql = "SELECT * FROM `users` WHERE username = '$myusername'";
      $result = mysqli_query($mysqli,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername, table row must be 1 row
  
        if($count == 1) {
         $error = "That username is taken";
          $err = 4;
        }
  
  if($err == 0){
    $query = "INSERT INTO `users`(`username`, `password`) VALUES ('$myusername','$mypassword')";
    mysqli_query($mysqli, $query);
    session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: index.php");
  }
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
  <link rel="stylesheet" href="tunefinderz.css" media="screen">

</head>

<body>
  <div id="container">
    <header>
      <h1 id="page-head">
        Playlist Generator
      </h1>
    </header>
    <main>
      <div>
        <h3 id="login-desc">
          Create or randomly generate playlists based on genre and artist preference!
        </h3>
      </div>
      <p id="login-err">
        <?php echo $error; ?>
      </p>
      <form action="" method="post" id="login-form">
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="username" name="username" class="form-control" id="username" maxlength="32">
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" name="pwd" class="form-control" id="pwd" maxlength="32">
        </div>
        <div class="form-group" id="login-conf-pwd">
          <label for="password">Confirm Password:</label>
          <input type="password" name="pwd_conf" class="form-control" id="conf-pwd" maxlength="32">
        </div>
        <div class="form-group">
          <span id="create-acct">Create New Account</span>
        </div>
        <input type="submit" name="login_user" id="log-btn" class="btn btn-default" value="Login"/>
        <input type="submit" name="register_user" id="reg-btn" class="btn btn-default" value="Register"/>
      </form>
    </main>
    <footer id="page-foot">TuneFinderz</footer>
  </div>
</body>

<script src="tunecontrol.js"></script>

</html>