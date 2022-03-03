<?php
include "index.php";

$nm = $_REQUEST['name'];
$ag = $_REQUEST['age'];
$gn = $_REQUEST['gender'];
$em = $_REQUEST['email'];
$ph = $_REQUEST['phone'];
$dc = $_REQUEST['desc'];

if(checkEmailExists($em,$conn)== true)
{
    $sql = "INSERT INTO trip(name, age, gender, email, phone, desc)
    VALUES ('".$nm."','".$ag."','".$gn."','".$em."','".$ph."','".$dc."')";
    if($conn->query(sql)===true){
        echo "New record create succssfully";
    }
    else{
        echo "Error: ". $sql . "<br>" . $conn->error;
    }
}
else{
    echo "Email is already access please enter new email address";
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