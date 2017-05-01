<?php
session_start();
require('databse_link.php');
		$name=$_SESSION['name'];
		$sql="SELECT * FROM login where username='$name'";
		$result=mysqli_query($conn,$sql);
		while($row= mysqli_fetch_assoc($result)){
		if($row['image']=='null' OR $row['image']==''){
			echo "<br><br><a href=\"index3.php\" target=\"blank\">Add profile picture<br><br></a>";
		}
		else{
			echo "profile picture is already set";
		}}
		?>