<?php
include "connection.php";


$nm=$_REQUEST['name'];
$em=$_REQUEST['email'];
$ph=$_REQUEST['phone'];
$ps=$_REQUEST['pass'];

if(checkEmailExists($em,$conn)==true){
  $sql = "INSERT INTO users (name, email, phone,password)            /*insert query*/
  VALUES ('".$nm."', '".$em."', '".$ph."','".$ps."')";
  
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}else
{
  echo "Email is already exist please enter different email address";
}


$conn->close();

// Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";

// echo json_encode($_REQUEST);exit;



function checkEmailExists($email,$conn)
{
  $sql = "SELECT * FROM `users`  where email='".$email."' ";            /* select query */
  $result = $conn-> query($sql);
  $row = $result->fetch_assoc();
  
  if(empty($row)==1)
  {
    return true;
  }else
  {
    return false;
  }

}


?>

