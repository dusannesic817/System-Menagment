<?php
require_once 'app/database/dbConn.php';
require_once 'app/classes/Member.php';
require_once 'app/classes/User.php';

$member= new Member();
$user= new User();

    if(isset($_GET['id']) && $user->isLoged()){

        $id=$_GET['id'];
       
        $delete=$member->delete_member($id);

        if($delete){
            $_SESSION['delete']= 'Delete Successfully';
            header("Location: member_list.php");
        }else{
            header('location: index.php');
        }

       
    }