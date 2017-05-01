<?php
session_start();
require('databse_link.php');

$uname=$_POST['uname'];
$pass=$_POST['psw'];

$tbl_name='users';

mysqli_select_db($conn,"$db_name")or die("cannot select DB");

$sql="SELECT * FROM login WHERE username='$uname' and password='$pass'";
//echo "$sql";

$result=mysqli_query($conn,$sql) or trigger_error(mysql_error.$sql);

if(mysqli_num_rows($result) < 1)
{
	//echo " .... LOGIN TRY  ....";
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Wrong Username or Password')
    window.location.href='home.php';
    </SCRIPT>");
	
	//header( "Refresh:5; url=home.html", true, 303);
	//header("location:home.html");
}
else
{
	$_SESSION['name'] = $uname; // Make it so the username can be called by $_SESSION['name']    //
	echo " ....   LOGIN  ....";
	echo $_SESSION['name'];
	header("location:profile1.php");    //
}

?>
