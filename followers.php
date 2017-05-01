<?php
require('databse_link.php');
session_start();
$userp=$_SESSION['name'];
$sql="SELECT username FROM login WHERE username!='$userp'";
$result=mysqli_query($conn,$sql);

echo "<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method=\"POST\" action=\"addfollower.php\">
	<table>
		<tr><td style=\"color:blue;\">Follow-></td>
		<td><select name=\"follow\">";
while($row=mysqli_fetch_array($result)){
	$name=$row['username'];  echo "<option value=\"$name\">$name</option>";}
echo "</select></td>
</tr><tr><td><input type=\"submit\" value=\"submit\"></td></tr>
</table>
</form>
</body>
</html>";
?>