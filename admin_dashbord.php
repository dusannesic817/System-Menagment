<?php

require_once 'app/database/dbConn.php';
require_once 'app/classes/Session.php';
require_once 'app/classes/User.php';

$user=new User();
$session= new Session();


if(!$user->isLoged()){

    header('location: index.php');
    exit();
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public/css/style.css">
    <title>Admin Dashbord</title>

</head>
<body>
    
        <?php  if($session->issetSession('success_reg_member')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php
                echo $_SESSION['success_reg_member'];
                unset($_SESSION['success_reg_member']);
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php  endif;?>
   

            <div>
                <a href='logOut.php'>Log Out</a>
            </div>
            <div>
                <a href='member_list.php'>List of members</a>
            </div>

            <div class=" container mt-5">
                <div class="row">
                  <h3>Registration Member</h3>
                    <div class="col-12 mt-3">
                        <form action="register_member.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name">
                          </div>
                          <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name">
                          </div>
                          <div class="mb-3">
                            <label for="number" class="form-label">Number</label>
                            <input type="text" class="form-control" id="number" name="number">
                          </div>
                          <div class="mb-3">
                            <label for="address" class="form-label">Adress</label>
                            <input type="text" class="form-control" id="address" name="address">
                          </div>
                          <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email">
                          </div>
                          <div class="mb-3">
                          <label for="" class="form-label">Treining Session</label>
                          <select class="form-select" name="training_plan_id">
                          
                          <?php
                            $sql='SELECT * FROM trainings';

                            $run=$dbconnection->getConnection()->query($sql);
                            $results=$run->fetch_all(MYSQLI_ASSOC);

                              foreach($results as $value){
                                echo "<option value='".$value['training_id']."'>".$value['name']." ".$value['sesions']."</option>";
                              }                            
                          ?>
  
                          </select>
                          </div>
                          <input type="hidden" name="photo_path" id="photoPathInput">
                          <div id="dropzone-upload" class="dropzone"></div>

                          <input type="submit" class="btn btn-primary mt-3" value="Register">
                        </form>
                    </div>

                </div>

            </div>
</body>
</html>