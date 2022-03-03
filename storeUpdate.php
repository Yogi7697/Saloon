<!-- <?php
include "connection.php";

$id=$_REQUEST['id'];

$username = $_REQUEST['username'];

$type = $_REQUEST['type'];

$time = $_REQUEST['time'];

$sql = "update appointments set name='".$username."', type='".$type."', time='".$time."' where id='".$id."' ";

if($conn->query($sql) === true) {
    echo "Record updated successfully";
}
else{
    echo "Error: " . $sql . "<br>" . $conn->error;exit;
}
$conn->close();

header("location: admin.php");

?> -->