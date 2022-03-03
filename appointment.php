<?php
session_start();

if(!empty($_SESSION) && $_SESSION['email']=="admin@gmail.com")
{
    header('location: /saloon/index.php');
}

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
    <title>Appointment Form</title>
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
        <a class="navbar-brand" href="index.html">Home</a>

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"></a>
            </li>

            </ul>
            <div class="d-flex justify-content-right">
            <a class="navbar-brand" href="api/logout.php">Logout </a>

            </div>
        </div>
    </nav>
    <h2 class="container d-flex justify-content-center my-3">Appointment For:</h2>
    <div class="container d-flex justify-content-center"> 
        <form action="" method="post">
            <div class="form-group p-3">
                <label for="exampleFormControlSelect1">Example select:</label>
                <select class="form-control" name="type" id="exampleFormControlSelect1">
                <option value="">Please Select Type</option>    
                <option>Haircut</option>
                    <option>Facial</option>
                    <option>Other</option>
                    
                </select>
            </div>
           
            <div class="text-center my-3">
                Date:<input type="text" name="time" class="time form-control">
            </div><br>
            
            <div class="text-center my-3">
                <button type="submit" class="btn btn-primary">Make Appointment</button>
            </div>
        </form>
    </div>
</body> 

</html>



<script>
    $(".time").flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });
</script>

<?php
include "connection.php";
$message= "New record created successfully!";

// print_r($_REQUEST);exit;
if(!empty($_REQUEST)){
$ty=$_REQUEST['type'];
$ti=$_REQUEST['time'];

  $sql = "INSERT INTO appointments (type, time, user_id) 
  VALUES ('".$ty."', '".$ti."','".$_SESSION['user_id']."')";
  
  if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'>alert('$message');</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}


$conn->close();

?>