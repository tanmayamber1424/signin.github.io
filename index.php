<?php

// echo 'hello world';
// include '_nav.php';

$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
include 'dbconnect.php';
$username = $_POST["username"];
$password = $_POST["password"];
$cpassword = $_POST["confirmpassword"];
$phonenumber = $_POST["phonenumber"];
$address = $_POST["address"];
// $exists = false;

$existssql = "SELECT * FROM `form records` WHERE username='$username'";
$result = mysqli_query($conn, $existssql);
$numExistsRows = mysqli_num_rows($result);

if($numExistsRows>0){
  //  $exists = true;
  $showError = "Please Choose Another Name. Username Already Exists!";
}else{


  // $exists = false;


if(($password == $cpassword)){
  
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO `form records` ( `Username`, `Password`, `Phone Number`, `Address`, `Date/Time`) VALUES ('$username', '$password', '$phonenumber', '$address', current_timestamp());";
    $result = mysqli_query($conn,$sql);
if($result){
    $showAlert = true;
}

}
else{
  $showError = "Passwords Do Not Match! ";
}
}
}
?>

<html>
<body>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Create An Account </title>
  </head>
  <body>
   <?php require '_nav.php'; ?> 

   <?php
   if($showAlert){
   echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your Account Is Successfully Created And Now You Can Login
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div> ';
}


   if($showError){
   echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Failed!</strong> '. $showError.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div> ';
}
?>
    <div class="container">
        <h1 class="text-center">SignUp To Our Website</h1>

    
        <form action="/testing/index.php" method="post">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="name" maxlength="13" placeholder="Enter Your UserName" class="form-control" id="username" name="username" aria-describedby="emailHelp">
   
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" maxlength="30" placeholder="Enter Your Password" class="form-control" id="password" name="password">
  </div>
  <div class="form-group">
    <label for="confirmpassword"> Confirm Password</label>
    <input type="password" placeholder="Confirm The Password" class="form-control" id="confirmpassword" name="confirmpassword">
    <small id="emailHelp" class="form-text text-muted">Make Sure Enter The Same Password Which You Entered In Password Box.</small>
  </div>
  <div class="form-group">
    <label for="phonenumber">Phone Number</label>
    <input type="Contact Number" maxlength="11" placeholder="Enter Your Phone Number" class="form-control" id="phonenumber" name="phonenumber">
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <textarea rows=5 type="address" maxlength="29" placeholder="Enter Your Address" class="form-control" id="address" name="address"></textarea>
  </div>
  
  <button type="submit" class="btn btn-primary">SignUp</button>
  <input type="reset" class="btn btn-success" value="Reset">
</form>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>