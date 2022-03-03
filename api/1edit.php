<?php
include "saloon/api/connection.php";

session_start();
include "api/connection.php";
error_reporting(E_ALL);
ini_set('display_errors', '1');

if(!empty($_REQUEST)){
    $username = $_REQUEST["username"];
    $sql = "SELECT * FORM student WHERE id=$user_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}else{
    header("location: 1edit.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
        <a href="edit.php">Edit</a>
        <input type="hidden" name="user_id" value="<?php echo $user_id ?>">;
        <input type="text" name="user_name" value="<?php echo $_row["user_name"]  ?>">
    </form>
</body>
</html>


<?php
if(isset($_REQUEST["user_name"]) && (isset($_REQUEST["user_id"]))){
    $sql = "UPDATE STUDENT SET NAME='".$_REQUEST('user_name')."' WHERE id='".$_REQUEST['user_id']."'";
    $result = $conn->query($sql);
    echo "<br><br>Record created sucessfully";
    header("refresh:1;url:update.php");
}


?>