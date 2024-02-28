<?php

class User{

    protected $db;

    public function __construct() {
        global $dbconnection;
        $this->db = $dbconnection;
    }

    public function createAdmin($username,$password){

        $hashPassword= password_hash($password,PASSWORD_DEFAULT);

        $sql='INSERT INTO `admin`(username, password)
        VALUES(?,?);
        ';

        $stmt=$this->db->getConnection()->prepare($sql);
        $stmt->bind_param('ss',$username,$hashPassword);

        $result= $stmt->execute();
        
           if ($result) {
                $lastInsertedId = $this->db->getConnection()->insert_id;
                $_SESSION["id"] = $lastInsertedId;
                return true;
            } else {
                return false;
            }

    }

    public function logIn($username,$password){

        $sql="SELECT `id`, `password` FROM `admin` WHERE `username`=?;
            ";

            $stmt= $this->db->getConnection()->prepare($sql);
            $stmt->bind_param('s', $username);
            $stmt->execute();

            $result= $stmt->get_result();

            if($result->num_rows==1){

                $row=$result->fetch_assoc();

                if(password_verify($password,$row['password'])){
                    $_SESSION['id']=$row['id'];

                    return true;
                }
            }

            return false;
    }


    public function isLoged(){

        if(isset($_SESSION['id'])){
            return true;
        }

        return false;
    }


    public function logOut(){
        unset($_SESSION['id']);
    }
    


}



