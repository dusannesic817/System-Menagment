<?php

class Configuration{

    private $serverName;
    private $username;
    private $password;
    private $databaseName;

   public function __construct($serverName,$username,$password,$databaseName){
        $this->serverName= $serverName;
        $this->username= $username;
        $this->password= $password;
        $this->databaseName=$databaseName;
    }


    public function getServerName(){
        return $this->serverName;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getPassword(){
        return $this->password;
    }

    public function getDatabaseName(){
        return $this->databaseName;
    }

}