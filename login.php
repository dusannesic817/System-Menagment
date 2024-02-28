<?php

require_once 'app/database/dbConn.php';
require_once 'app/classes/User.php';

$error_login='';


    if($_SERVER['REQUEST_METHOD']=="POST"){

        $username=$_POST['username'];
        $password=$_POST['password'];

        $user= new User();

        $login=$user->logIn($username,$password);

        if($login){
            $_SESSION['success_message']= 'Uspesno ste se ulogovali';
            header('location: admin_dashbord.php');

            exit();
        }else{
          $_SESSION['unsuccess_message']= 'Neispravna lozinka ili usernama';
          header('location: index.php');
          
        }
    }


