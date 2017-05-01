<?php
session_start();
require('databse_link.php');
$name=$_SESSION['name'];
$value=mysqli_real_escape_string($conn,$_GET['to']);
$sql="UPDATE `follower` SET `request`=FALSE WHERE follower='$name' AND username='$value' AND request=TRUE";
$result=mysqli_query($conn,$sql);
$sql2="INSERT INTO follower(username,request,follower) VALUES('$name',FALSE,'$value')";
$result2=mysqli_query($conn,$sql);
	echo $value." and you are now friends.\n";
?>