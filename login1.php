<?php
include "connection.php";

$email = $_REQUEST["users"];
$password = $_REQUEST["password"];


$sql = "SELECT * FROM users WHERE email='".$email."' and password='".$password."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if(empty(!$conn)==1){
session_start();
$_SESSION["id"]=$row["id"];
$_SESSION["username"]=$row["name"];
$_SESSION["email"]=$row["email"];
echo  1;

}
else{
    session_destroy();
    echo 0;
}



?>