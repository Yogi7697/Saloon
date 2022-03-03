<?php
include "connection.php";

$id=$_REQUEST['id'];

$sql = "delete from appointments where id='".$id."' ";

if($conn->query($sql) === true) {
    echo "Record deleted successfully ";
}
else{
    echo "Error: " . $sql . "<br>" . $conn->error;exit;
}

$conn->close();

header("location: /saloon/admin.php");


?>