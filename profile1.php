<?php
session_start();
require('databse_link.php');?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="style2.css">
	<title>Welcome-<?php echo $_SESSION['name']; ?></title>
</head>
<body>
<div id="l02">
<table>
	<tr>
		<div class="w3-container">
  <h4 style="text-align: center"><span class="sp02">My Profile</span></h4>
  <div class="w3-container">
  <?php
$name=$_SESSION['name'];
$sql="SELECT * FROM login WHERE username=\"$name\"";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
$dir="uploads2/".$row["image"];
  echo "<html><body><img src=\"$dir\" style=\"border-radius: 250;border:3px solid blue;\" width=\"180\" height=\"179\" class=\"w3-circle\"></body></html>";
  ?>
  <h3 style="text-align: center"><?php echo $_SESSION['name']; ?></h3><p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Designer, UI</p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> London, UK</p>
         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> April 1, 1988</p>
         <br><br>
         <h4 style="margin-left: 35px;">Followers</h4>
         <a href="followers.php" target="ourlove">Followers</a><br>
         <a href="">Profile</a><br>
         <a href="logout.php">Logout</a>
</div>
	</tr>
</table>
</div>
<div id="l01">
		<form action="submit3.php" method="POST" enctype="multipart/form-data">
			<table>
				<tr><h3 style="margin-left: 100px">POST</h3></tr>
				<tr>
					<td>
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<textarea name="postcontent" cols="100"></textarea>
					</td>
				</tr>
				<tr>
					<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						<input type="file" name="fileToUpload">
						<button type="submit">POST</button>
					</td>
				</tr>

			</table>
			<br><br>
		</form><iframe src="profile_mat.php" name="our_love" style="background-color: white;" height="550px" width="100%"></iframe>
</div>
</body>
</html>
