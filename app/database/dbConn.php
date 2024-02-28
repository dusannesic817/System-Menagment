<?php

require_once 'Configuration.php';
require_once 'Connection.php';
session_start();

$configuration = new Configuration('localhost','root','','gym');
$dbconnection= new Connection($configuration);


//$conc=$connection->getConnection();

//$GLOBALS['conc']=$connection;