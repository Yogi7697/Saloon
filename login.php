<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();
include "connection.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <a class="navbar-brand mx-3" href="index.html">Home Page</a>

    </nav>
    <div id="navBar"></div>
    
    <h2 class="container d-flex justify-content-center my-3">Login Page:</h2>
    <div class="container d-flex justify-content-center">
        <form method="POST">
            <div class="form-group p-3">
                <label for="formGroupExampleInput">Email Id:</label>
                <input type="text" class="form-control" name="username" id="user" placeholder="User Name" autocomplete="off">
                <h6 id="usercheck"></h6>

            </div>
            <div class="form-group p-3">
                <label for="formGroupExampleInput2">Password:</label>
                <input type="password" class="form-control" name="password" id="pass" placeholder="Password" autocomplete="off">
                <h6 id="passcheck"></h6>
                <small id="emailHelp" class="form-text text-muted">We'll never share your password with anyone
                    else.</small>
            </div>

            <div class="text-center">
            <button type="submit" name="submit" value="Login" class="btn btn-info">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>




<?php
if(isset($_POST['submit'])){
    $user = $_POST['username'];
    $pwd = $_POST['password'];
    
    $query = "SELECT * FROM users where email='$user' and password='$pwd'";
    
    $data = mysqli_query($conn, $query);
    $total = mysqli_num_rows($data);

    $result = $conn-> query($query);
    $row = $result->fetch_assoc();
    if($total == 1){
        $_SESSION['user_name']= $user;
        $_SESSION['user_id']= $row['id'];
        if($user == 'admin@gmail.com'){
            header("location: admin.php");
        }else{
            header("location: appointment.php");
        }
        
    }
    else{
        echo  "Login Failed";
    }

}

?>