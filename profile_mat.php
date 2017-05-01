<?php
require('databse_link.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>Follow-Up Requests</h3>
<?php
$name=$_SESSION['name'];
$sql="SELECT * FROM follower WHERE follower=\"$name\" AND request=1";
$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($result)){
	$message2=$row['username'];
	$message=$row['username']." has requested to follow you";
	echo "<html><body><h4 name=\"notice\"><input disabled=\"disabled\" name=\"add\" value=\"$message2\"></h4></body></html>";
	echo "<html><body><h3>$message</h3><a href=\"add.php?to=$message2\" target=\"_blank\">Accept</a></body></html>";
}
?>



<h1>Your Posts</h1>
<?php
$name=$_SESSION['name'];
$sql="SELECT * FROM post WHERE uname=\"$name\"";
$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($result)){
	$location="uploads/".$row['image'];
	$message=$row['post'];
	echo "<html><body><img src=\"$location\" width=\"500px\" height=\"150px\"><h3>\"$message\"</h3></body></html>";
}
	echo "<html>
<body>
<a href=\"addprofile.php\" target=\"_blank\">Add Profile Picture</a>
</body>
</html>";
?>
<h1>Friends Posts</h1>
<?php
$name=$_SESSION['name'];
$sql6="SELECT * FROM follower WHERE follower='$name' AND request=FALSE";
$result6=mysqli_query($conn,$sql6);
while($row6=mysqli_fetch_array($result6)){
	$thai=$row6['username'];
$sql="SELECT * FROM post WHERE uname=\"$thai\"";
$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($result)){
	$location="uploads/".$row['image'];
	$message=$thai."->".$row['post'];
	echo "<html><body><img src=\"$location\" width=\"500px\" height=\"150px\"><h3>\"$message\"</h3></body></html>";
}
}
?>
</body>
</html>