<?php // Example 26-6: checkuser.php
  require('databse_link.php');
	mysqli_select_db($conn,"$db_name")or die("cannot select DB");
  if (isset($_POST['user']))
  {
    $user   = $_POST['user'];
    $result= mysqli_query($conn,"SELECT * FROM users WHERE username='$user'");
	if ($result->num_rows){
		
		   echo  "<span class='taken'>&nbsp;&#x2718; " .
            "This username is taken</br></span>";
	}
      
    else
      
			echo "<span class='available'>&nbsp;&#x2714; " .
           "This username is available</br></span>";
  }
?>
