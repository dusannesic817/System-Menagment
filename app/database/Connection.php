<?php

class Connection{

   private $connection;
   private $config;


    public function __construct(Configuration $configuration){
        $this->config=$configuration;
    }


    public function getConnection(){
     
        $this->connection= new mysqli($this->config->getServerName(),
                                    $this->config->getUsername(),
                                    $this->config->getPassword(),
                                    $this->config->getDatabaseName());

        

        
    return $this->connection;
    }
 
 }