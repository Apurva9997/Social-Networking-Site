<?php

session_start();
require('databse_link.php');

$user=$_POST['user'];
$pass=$_POST['pass'];
$pass2=$_POST['psw-repeat'];



if($pass!=$pass2){
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Password not same')
    window.location.href='home.php';
    </SCRIPT>");
	//header( "Refresh:5; url=home.html", true, 303);
	//header("location:home.html");
}
else{
	$sql="INSERT INTO login (username, password) VALUES ('$user', '$pass')";
	$result=mysqli_query($conn,$sql);
	if(!$result) echo("Error description: " . mysqli_error($conn));
	$_SESSION['name']=$user;
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Successful')
    window.location.href='home.php';
    </SCRIPT>");
}
	

?>