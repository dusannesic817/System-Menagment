<?php

require_once 'app/database/dbConn.php';
require_once 'app/classes/User.php';
require_once 'app/classes/Session.php';
require_once 'login.php';

/*$porukaTekst = "";

    
if (isset($_SESSION["message"]) && isset($_SESSION["message"]["type"])){
   
    if (isset($_SESSION["message"]["text"])){
        $porukaTekst = $_SESSION["message"]["text"];
    }
    unset($_SESSION["message"]);
}*/

?>

<!--
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
<p><?php //echo $porukaTekst ?></p>
<div class="container mt-5">
    <div><a href='login.php'>Login</a></div>
    <div><a href='register.php'>Register</a></div>
</div>
</body>
</html>-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public/css/style.css">
    <title>Index</title>

    <style>
        html, body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #4D4855;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="card" style="width: 18rem; opacity: 0.9;">
            <div class="card-body">
                <h3 class="text-center mb-4">Log in</h3>
                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <div id="" class="form-text">
                            <?php 
                                if(isset($_SESSION['unsuccess_message'])){
                                    echo $_SESSION['unsuccess_message'];
                                    unset($_SESSION['unsuccess_message']);
                                }
                            ?>
                        </div>
                    </div>
                    <p class="mt-3 text-center"><a href="reset_password.php">Forgot Password?</a></p>
                    <div style="text-align:center">
                    <button type="submit" class="btn btn-primary">Log in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>