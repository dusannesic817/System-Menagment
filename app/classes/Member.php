<?php



class Member{

    protected $db;

    public function __construct() {
        global $dbconnection;
        $this->db = $dbconnection;
    }


    public function registerMember($first_name, $last_name, $number, $address, $email, $photo_path, $training_id, $access_card) {
        
    
        $sql = "INSERT INTO members (first_name, last_name, number, address, email, photo_path, training_id, access_card_pdf_path)
        VALUES (?,?,?,?,?,?,?,?)";
    
        $stmt = $this->db->getConnection()->prepare($sql);
    
        $stmt->bind_param('ssssssis', $first_name, $last_name, $number, $address, $email, $photo_path, $training_id, $access_card);
    
        $result = $stmt->execute();
    
        if ($result) {
            $lastInsertedId = $this->db->getConnection()->insert_id;
            $_SESSION["member_id"] = $lastInsertedId;
            return true;
        } else {
            return false;
        }
    }
    

    public function list($limit,$get){

        $start=($get-1)*$limit;
       
     

        $sql="SELECT members.*,
        trainers.fist_name as trainer_first_name,
        trainers.last_name as trainer_last_name,
        trainings.name as training_name,
        trainings.sesions as training_session,
        trainings.price as training_price
       FROM members
       LEFT JOIN trainers on members.trainer_id = trainers.trainer_id
       LEFT JOIN trainings on members.training_id = trainings.training_id
       LIMIT $start,$limit
     
       ";
        $run=$this->db->getConnection()->query($sql);
        $results=$run->fetch_all(MYSQLI_ASSOC);
        
        return $results;

     
    
}


    public function count(){
        $sql='SELECT count(member_id) as member_id  FROM members';
        $run= $this->db->getConnection()->query($sql);
        $result=$run->fetch_assoc();

        return $result;

    }

    

    

}





/*

INSERT INTO members (first_name, last_name, number, address, email, photo_path, training_id, access_card_pdf_path, created_at) 
VALUES ('Tijama','Nesic','0613019714','Adresa','tica@gmail.com','put.jph',1,'path..', CURRENT_TIMESTAMP);




*/ 


    