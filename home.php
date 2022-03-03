
<?php
session_start();
error_reporting(0);
include "connection.php";
$userprofile = $_SESSION['user_name'];
if($userprofile == true){

}else{
    header("location: loginn.php");
}

echo "Welcome ". $_SESSION['user_name'];
$query = "SELECT * FROM users where email='$user' and password='$pwd'";
$data = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($data);

?>

<footer>
<a href="logout.php">Logout</a>
</footer>
