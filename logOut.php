<?php

require_once 'app/database/dbConn.php';
require_once 'app/classes/User.php';


$user= new User();

$user->logOut();

header('location:index.php');
exit();