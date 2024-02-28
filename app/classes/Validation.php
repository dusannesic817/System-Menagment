<?php


class Validation{

 

    public function usernameValidation($u){
 
    
        if(empty($u)){
    
            return "Usernom cannot be blank";
    
        }elseif(preg_match('/\s/',$u)){
    
            return "Username cannot contain spaces";
    
        }elseif(strlen($u)<5 || strlen($u)>25){
    
            return "Username must be between 5 and 25 characters";
    
        }else
            return "";
        }
    



    public function passwordValidation($u){
        if(empty($u)){

            return "Password cannot be blank";
    
        }elseif(preg_match('/\s/',$u)){
    
            return "Password cannot contain spaces";
    
        }elseif(strlen($u)<5 || strlen($u)>50){
    
            return "Password must be between 5 and 50 characters";
    
        }else{
            return "";
        }
}

}