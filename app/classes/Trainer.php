<?php


class Trainer {

    protected $db;

    public function __construct() {
        global $dbconnection;
        $this->db = $dbconnection;
    }



    public function createTrainer($first_name,$last_name,$email,$phone){

        $sql='INSERT INTO trainers(fist_name,last_name,email,phone_number)
                VALUES (?,?,?,?);
        
        ';

        $stmt=$this->db->getConnection()->prepare($sql);
        $stmt->bind_param('ssss',$first_name,$last_name,$email,$phone);
        $result=$stmt->execute();


        if($result){
            $lastInsertId=$this->db->getConnection()->insert_id;
            $_SESSION['trainer_id']=$lastInsertId;

            return true;
        }else{
            echo "Greška prilikom izvršenja upita za umetanje podataka: " . $stmt->error;
            return false;
        }

    }
}