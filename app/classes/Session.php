<?php


class Session{


    public function issetSession($session){

        if(isset($_SESSION[$session])){
            return true;
        }

        return false;
    }


 
}