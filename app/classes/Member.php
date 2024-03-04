<?php

require_once 'fpdf/fpdf.php';

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
           $lastId=$this->db->getConnection()->insert_id;
            $this->generetePdf($lastId,$first_name,$last_name,$email);
            return true;
        } else {
            echo "Greška prilikom izvršenja upita za umetanje podataka: " . $stmt->error;
            return false;
        }
        
    }
    

    public function list($limit, $get, $search = null) {

        $start = ($get - 1) * $limit;
        $sql = "SELECT members.*,
        trainers.fist_name as trainer_first_name,
        trainers.last_name as trainer_last_name,
        trainings.name as training_name,
        trainings.sesions as training_session,
        trainings.price as training_price
        FROM members
        LEFT JOIN trainers ON members.trainer_id = trainers.trainer_id
        LEFT JOIN trainings ON members.training_id = trainings.training_id";
    
    if ($search) {
        $searchTerms = explode(" ", $search); 
        $firstName = $searchTerms[0];
        $lastName = isset($searchTerms[1]) ? $searchTerms[1] : '';
    
       
        if ($lastName) {
            $sql .= " WHERE members.first_name LIKE '%$firstName%' AND members.last_name LIKE '%$lastName%'";
        } else {
            $sql .= " WHERE members.first_name LIKE '%$firstName%' OR members.last_name LIKE '%$firstName%'";
        }
    }
    
        $sql .= " LIMIT $start, $limit";
    
        $run = $this->db->getConnection()->query($sql);
        $results = $run->fetch_all(MYSQLI_ASSOC);
    
        return $results;
    }
    
    public function count(){
        $sql='SELECT count(member_id) as member_id  FROM members';
        $run= $this->db->getConnection()->query($sql);
        $result=$run->fetch_assoc();

        return $result;

    }

    public function delete_member($id){

        $sql='DELETE FROM members WHERE member_id=? LIMIT 1';

        $stmt=$this->db->getConnection()->prepare($sql);
        $stmt->bind_param('i',$id);
        return $stmt->execute();
    }

    
    public function edit_member($id){

    }


    
    public function generetePdf($id,$first_name,$last_name,$email){
        $pdf = new FPDF();

        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40,10,'Access Card');
        $pdf->Ln();
        $pdf->Cell(40,10,'Member ID: '. $id);
        $pdf->Ln();
        $pdf->Cell(40,10,'Name: '. $first_name. ' '. $last_name);
        $pdf->Ln();
        $pdf->Cell(40,10,'Email: '. $email);
        $pdf->Ln();
            
        $filename = "public/acess_cards/acess_cards_" . $id . ".pdf";
        $pdf->Output('F', $filename);
    }

}





/*

INSERT INTO members (first_name, last_name, number, address, email, photo_path, training_id, access_card_pdf_path, created_at) 
VALUES ('Tijama','Nesic','0613019714','Adresa','tica@gmail.com','put.jph',1,'path..', CURRENT_TIMESTAMP);




*/ 


    