<?php
require('databse_link.php');
session_start();
$userp=$_SESSION['name'];
$choice=$_POST['follow'];
$sql2="SELECT * FROM follower WHERE username='$userp' AND follower='$choice'";
   	$result2=mysqli_query($conn,$sql2);
	$name=$_SESSION['name'];
	$pop=mysqli_num_rows($result2);
   if (isset($_POST['follow'])==TRUE&&$pop==0) {
   	$sql="INSERT INTO follower(username,request,follower) VALUES('$name',TRUE,'$choice')";
   	$result=mysqli_query($conn,$sql);
   	echo "Request Sent Successfully";
   } 
   else if($pop!=0){
   	echo "Already Followed or Requested";
   }
   	else {
     echo "Selection is mandatory";
     exit; 
   }