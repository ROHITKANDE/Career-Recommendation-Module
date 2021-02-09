<?php
session_start();
if(isset($_SESSION["email"])){
session_destroy();
}
include_once 'dbConnection.php';
$ref=@$_GET['q'];
$email = $_POST['email'];
$password = $_POST['password'];
$id = $_POST['id'];
$userid = $_POST['id'];

$email = stripslashes($email);
$email = addslashes($email);
$password = stripslashes($password); 
$password = addslashes($password);
$password=$password; 
$result = mysqli_query($con,"SELECT * FROM user WHERE email = '$email' and password = '$password'") or die('Error');
$count=mysqli_num_rows($result);
if($count==1){
while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
	$email = $row['email'];
	$id = $row['id'];
}
$_SESSION["name"] = $name;
$_SESSION["email"] = $email;
$_SESSION["id"] = $id;
header("location:account.php?q=1");
}
else
header("location:$ref?w=Wrong Username or Password");


?>