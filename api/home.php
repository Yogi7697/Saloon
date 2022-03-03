<?php
session_start();
error_reporting();
include "connection.php";
$userprofile = $_SESSION['user_name'];
if($userprofile == true){

}else{
    header("location: login.php");
}


$query = "SELECT * FROM users where email='$user' and password='$pwd'";
$data = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($data);
echo "Welcome ". $result['name'];

?>

<a href="login.php">Logout</a>