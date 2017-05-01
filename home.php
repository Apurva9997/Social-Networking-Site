<!DOCTYPE html>
<html>
  <head>
  <script src='/sty.js'></script>
  <link rel='stylesheet' href='bootstrap/css/bootstrap.min.css'>
  <link rel='stylesheet' href='style1.css'>

<?php
  echo <<<_END
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js'></script>
  <script src = 'javascript.js'></script>
  <script>
    function checkUser(user)
    {
      if (user.value == '')
      {
      document.getElementById('info').innerHTML = ''
      return
      }

      params  = "user=" + user.value
      request = new ajaxRequest()
      request.open("POST", "checkuser.php", true)
      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
      request.setRequestHeader("Content-length", params.length)
      request.setRequestHeader("Connection", "close")

      request.onreadystatechange = function()
      {
      if (this.readyState == 4)
        if (this.status == 200)
        if (this.responseText != null)
          document.getElementById('info').innerHTML = this.responseText
      }
      request.send(params)
    }

    function ajaxRequest()
    {
      try { var request = new XMLHttpRequest() }
      catch(e1) {
      try { request = new ActiveXObject("Msxml2.XMLHTTP") }
      catch(e2) {
        try { request = new ActiveXObject("Microsoft.XMLHTTP") }
        catch(e3) {
        request = false
      } } }
      return request
    }
  </script>
_END;
?>

  </head>
  <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      
  <body class="w3-content" style="max-width:1300px">
    <div class="topnav">
      <button onclick="home.html" style="width:auto;">Home</button>
      <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
      <button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Sign Up</button>
      <button onclick="final.html" style="width:auto;">About</button>
    </div>

    <div id="id01" class="modal">
  
  <form class="modal-content animate" action="action_page.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="https://cyac.com/sites/default/files/teams/Team5%20Logo_0.JPG" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit">Login</button>
      <input type="checkbox" checked="checked"> Remember me
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">x</span>
 

<?php
 $error = $user = $pass = "";
  //if (isset($_SESSION['user'])) destroySession();

  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);

    if ($user == "" || $pass == "")
      $error = "Not all fields were entered<br><br>";
    else
    {
      $result = queryMysql("SELECT * FROM members WHERE user='$user'");

      if ($result->num_rows)
        $error = "That username already exists<br><br>";
      else
      {
        queryMysql("INSERT INTO members VALUES('$user', '$pass')");
        die("<h4>Account created</h4>Please Log in.<br><br>");
      }
    }
  }

  echo <<<_END
  <form class="modal-content animate" action="signup_page.php" method="POST">
    <div class="container">
      <label><b>User Name</b></label>
      <input type="text" placeholder="Enter User Name" name="user" required type='text' maxlength='16' name='user' onBlur='checkUser(this)'><span id='info'></span>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="pass" required>

      <label><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
      <input type="checkbox" checked="checked"> Remember me
_END
?>

      <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Sign Up</button>
      </div>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<script>
var modal = document.getElementById('id01');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

    <div class="parallax">
      
    </div>
    <div class="nik" id="nik">
      <h3 style="text-align:center;">ABOUT US</h3>
      <div class="w3-container w3-padding-32" id="about">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">About</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint
      occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
      laboris nisi ut aliquip ex ea commodo consequat.
    </p>
  </div>

  <div class="w3-row-padding w3-grayscale">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="https://scontent.fmaa1-1.fna.fbcdn.net/v/t1.0-9/15965430_1309684365733486_464317289367658957_n.jpg?oh=21ecae0b28409db7b81645a6bf1b0151&oe=594CD528" alt="Yash " style="width:100%">
      <h3>Yash Raj Jain</h3>
      <p class="w3-opacity">CEO & Founder</p>
      <p>Person that keeps everything intact.</p>
      
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="https://cdn.hrcdn.net/s3_pub/hr-avatars/12935cc6-9a42-4e20-b793-ba18ec4a37f5/150x150.png" alt="Ayush" style="width:100%">
      <h3>Ayush Tripathi</h3>
      <p class="w3-opacity">Architect</p>
      <p>Name it he knows it all.</p>
      
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="https://scontent.fmaa1-1.fna.fbcdn.net/v/t1.0-9/14067573_1093146324105149_3090236500164673482_n.jpg?oh=98acc0b2e50553e7ab32b3f3ab5a1e91&oe=59537C2E" alt="Apurva" style="width:100%">
      <h3>Apurva Garg</h3>
      <p class="w3-opacity">Architect</p>
      <p>Head of the technical department holds expertise in back end development.</p>
      
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="https://pbs.twimg.com/profile_images/746290251199451136/3ut94h8C.jpg" alt="Nikhil" style="width:100%">
      <h3>Nikhil Arora</h3>
      <p class="w3-opacity">Architect</p>
      <p>Passionate front end developer and management head.</p>
      
    </div>
  </div>


    </div>

    
  </body>
</html>
