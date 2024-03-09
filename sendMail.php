<?php


require_once 'app/database/dbConn.php';
require_once 'app/classes/Session.php';
require_once 'app/classes/Member.php';
require_once 'app/classes/Mailer.php';

date_default_timezone_set('Europe/Belgrade');

$currentDate = date('Y-m-d');
//$dateHard_core=date('2024-4-5');

$member=new Member();

$list_member=$member->sendMailToMember();
foreach($list_member as $value){
    $expired=$value['expired'];

    $daysUntilNextMonth = (strtotime($expired) - strtotime($currentDate)) / (60 * 60 * 24);
    $daysUntilNextMonth=ceil($daysUntilNextMonth);

    if($daysUntilNextMonth==1){
      
        $emails=($value['email']);

      // sendMail($emails);

    }

}




