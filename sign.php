<?php
include_once 'dbConnection.php';
ob_start();
$name = $_POST['name'];
$name= ucwords(strtolower($name));
$gender = $_POST['gender'];
$email = $_POST['email'];
$college = $_POST['college'];
$mob = $_POST['mob'];
$password = $_POST['password'];
$name = stripslashes($name);
$name = addslashes($name);
$name = ucwords(strtolower($name));
$gender = stripslashes($gender);
$gender = addslashes($gender);
$email = stripslashes($email);
$email = addslashes($email);
$college = stripslashes($college);
$college = addslashes($college);
$mob = stripslashes($mob);
$mob = addslashes($mob);

$password = stripslashes($password);
$password = addslashes($password);
//$password = md5($password);


$result = mysqli_query($con,"SELECT * FROM user WHERE email = '$email' ");
$count=mysqli_num_rows($result);
if($count==1){

header("location:index.php?q7=Email Already Registered!!!");


}
else
{

		
$q3=mysqli_query($con,"INSERT INTO user (name, gender, college, email, mob, password)
 VALUES  ('$name' , '$gender' , '$college','$email' ,'$mob', '$password')");


/*$q3=mysqli_query($con,"INSERT INTO user VALUES  ('$name' , '$gender' , '$college','$email' ,'$mob', '$password')");
*/echo "q3";
if($q3)
{
session_start();
$_SESSION["email"] = $email;
$_SESSION["name"] = $name;

header("location:account.php?q=1");
}
else
{
header("location:index.php?q7=Email Already Registered!!!");
}

}





ob_end_flush();
?>