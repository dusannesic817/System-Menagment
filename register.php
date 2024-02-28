<?php

require_once 'app/database/dbConn.php';
require_once 'app/classes/User.php';
require_once 'app/classes/Validation.php';

$usernameValidation='';
$passwordValidation='';


if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $user= new User();
    $validation= new Validation();

    $usernameValidation= $validation->usernameValidation($username);
    $passwordValidation = $validation->passwordValidation($password);


    if($usernameValidation== NULL && $passwordValidation== NULL){
        
        $create=$user->createAdmin($username,$password);

        if($create){
            $_SESSION["message"]["type"]= "success"; 
            $_SESSION["message"]["text"]= "Successfully registered account"; 
            header("Location: index.php");
            exit();
        }
    }else{
        $usernameValidation;
        $passwordValidation;
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Register</title>
</head>
<body>
<div class="container mt-5">
    <h3>Register</h3>
<form action="" method="POST">
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username">
    <div id="passwordHelpBlock" class="form-text">
       <?php echo $usernameValidation?>
    </div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
    <div id="passwordHelpBlock" class="form-text">
    <?php echo $passwordValidation?>
    </div>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>