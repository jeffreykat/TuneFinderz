/*
 * Playlist Generator Control
 * Author: Katherine Jeffrey
 */

//Login page
var createAcctLink = document.getElementById('create-acct');
var confirmPass = document.getElementById('login-conf-pwd');
var loginBtn = document.getElementById('log-btn');
var registerBtn = document.getElementById('reg-btn');
var loginErr = document.getElementById('login-err');
var username = "";
var pwd = "";
var conf = "";
var gpid;

var isNewAcct = false;

createAcctLink.addEventListener('click', createAccount);

//When Create New Account Option is selected 
function createAccount(event) {
  confirmPass.style.display = "block";
  createAcctLink.style.display = "none";
  loginBtn.style.display = "none";
  registerBtn.style.display = "block";
  isNewAcct = true;
}

//Dashboard page

function displayPlaylists(pidarg) {
  var name = document.getElementById(pidarg).value;
  var pid = 'pid=' + pidarg;
  gpid = pidarg;
  $.ajax({
    type: "POST", 
    url: "playlistTable.php", 
    data: pid, 
    cache: false,
    success: function(html){
      document.getElementById('table-body').innerHTML = html;
    }
  });
  var editTitle = document.getElementById('edit-title');
  var randomGenSection = document.getElementById('rand-section');
  var createSection = document.getElementById('create-section');
  var editSection = document.getElementById('edit-section');
  randomGenSection.style.display = "none";
  createSection.style.display = "none";
  editTitle.innerHTML = name;
  editSection.style.display = "block";
}

function hidePlaylists() {
  var randomGenSection = document.getElementById('rand-section');
  var createSection = document.getElementById('create-section');
  var editSection = document.getElementById('edit-section');
  var editTitle = document.getElementById('edit-title');
  var songTable = document.getElementById('add-songs-form');
  songTable.style.display = "none";
  randomGenSection.style.display = "block";
  createSection.style.display = "block";
  editSection.style.display = "none";
}

function deleteSong(sid){
  var playlist = document.getElementById(sid).value;
  console.log("playlist id: " + playlist + "sid: " + sid);
  var data = 'sid='+sid+'&pid='+playlist;
  gpid = playlist;
  $.ajax({
    type: "POST", 
    url: "deleteSong.php", 
    data: data, 
    cache: false, 
    success: function(rpid){
      displayPlaylists(rpid);
    }
  });
}

function showAddSongs(){
  var songTable = document.getElementById('add-songs-form');
  songTable.style.display = "block";
}

function filterSongs(){
  var genre = document.getElementById('selGenre').value;
  var popularity = document.getElementById('selPop').value;
  var loc = document.getElementById('selLoc').value;
  //console.log("genre:" + genre + ", popularity:" + popularity + ", location:" + loc + ".");
  var data = 'g='+genre+'&p='+popularity+'&loc='+loc+'&pid='+gpid;
  $.ajax({
    type: "POST", 
    url: "filterSongs.php", 
    data: data, 
    cache: false, 
    success: function(html){
      document.getElementById('add-table-body').innerHTML = html;
    }
  });
} 

function addSong(sid){
  var pid = document.getElementById(sid).value;
  var data = 'sid='+sid+'&pid='+pid;
  console.log("playlist id: " + pid + "sid: " + sid);
  $.ajax({
    type: "POST", 
    url: "addSong.php", 
    data: data, 
    cache: false,
    success: function(rpid){
      displayPlaylists(rpid);
    }
  });
}







