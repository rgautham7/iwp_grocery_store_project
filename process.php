<?php
$username = $_POST ['user'];
$password = $_POST ['pass'];

$username = stripcslashes($username);
$password = stripcslashes($password);

$db = mysqli_connect("localhost", "root", "","grocery2");

$result = mysqli_query($db,"select * from clerks where username = '$username' and password = '$password'") 
or die("Failed to query database".mysqli_error());
$row = mysqli_fetch_array($result);
if ($row['username']==$username && $row['password'] == $password)
 {
	header("location: index.php");
} 
else 
{
	echo "Failed to login!";
}

?>