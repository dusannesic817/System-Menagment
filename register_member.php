<?php

    require_once 'app/database/dbConn.php';
    require_once 'app/classes/Member.php';


    if($_SERVER['REQUEST_METHOD']=="POST"){

        $fist_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];
        $number=$_POST['number'];
        $address=$_POST['address'];
        $email=$_POST['email'];
        $training_id=$_POST['training_plan_id'];
        $photo_path=$_POST['photo_path'];
        $pdf='';

        $member= new Member();

        $create=$member->registerMember($fist_name,$last_name,$number,$address,$email,$photo_path,$training_id,$pdf);

        if($create){
           
            $_SESSION['success_reg_member']='Uspesno ste registrovali clana';

            header('location: admin_dashbord.php');
            exit();
        }else{

        }

    }