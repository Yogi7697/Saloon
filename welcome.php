<?php
session_start();

// print_r($_SESSION);exit;

if(!empty($_SESSION))
{
    $username=$_SESSION['username'];
}else
{
    header('location: /saloon/login.php');
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
    <h2>Welcome <?php echo $username; ?></h2>
    <a href="api/logout.php">Logout</a>
</body>
</html>