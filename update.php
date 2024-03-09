<?php
require_once 'app/database/dbConn.php';
require_once 'app/classes/User.php';
require_once 'app/classes/Session.php';
require_once 'app/classes/Member.php';
require_once 'inc/header.php';

date_default_timezone_set('Europe/Belgrade');
$currentDate = date('Y-m-d');

$nextMonthDate = date('Y-m-d', strtotime('+1 month', strtotime($currentDate)));


$session= new Session();
$user= new User();
$member= new Member();

if(isset($_GET['id']) && $user->isLoged()){

    $id=$_GET['id'];
    $_SESSION['memberId']=$id;
   

    $list=$member->memberId($id);

    foreach($list as $value){
        //var_dump($value);

       $first_name= $value['first_name'];
       $last_name= $value['last_name'];
       

       //var_dump($value['first_name']);
    }
    
}


    if($_SERVER["REQUEST_METHOD"]=="POST"){
        
        $trainer_id=$_POST['trainer_id'];
        $training=$_POST['training_plan_id'];
        $date_created=$_POST['start_date'];
        $date_exp=$_POST['expirience_date'];

        $edit=$member->editMember($_SESSION['memberId'],$date_created,$date_exp,$trainer_id,$training);

        if($edit){
            $_SESSION['update']= 'Uspesno upisan clan';
            header('location:update.php?id='.$_SESSION['memberId']);
           exit();
        }else{
            $_SESSION['update']= 'Neuspesno upisan clan';
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public/css/style.css">
    <title>Update member</title>
</head>
<body>
<?php  if($session->issetSession('update')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php
                
                echo $_SESSION['update'];
                unset($_SESSION['update']);
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php  endif;?>
    <form action="" method='POST'>
        <div class='container'> 
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Trainer</th>
                        <th scope="col">Training Session</th>       
                        <th scope="col">Date started</th>
                        <th scope="col">Date experience</th>
                        <th scope="col">Submit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $first_name . " " . $last_name?></td>
                        <td>
                            <select class="form-select" name="trainer_id" aria-label="Small select example">
                                <option selected>Select Trainer</option>
                                <?php
                                $list = $member->listTrainers();
                                foreach ($list as $value) {
                                    echo "<option value='".$value['trainer_id']."'>".$value['fist_name']." ".$value['last_name']."</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <select class="form-select" aria-label="Small select example" name="training_plan_id">
                                <?php
                                if (isset($_SESSION['select_trainings'])) {
                                    $trainings = $_SESSION['select_trainings'];
                                    foreach ($trainings as $value) {
                                        echo "<option value='".$value['training_id']."'>".$value['name']." ".$value['sesions']."</option>";
                                        $training_id=$value['training_id'];
                                    }
                                }
                                ?>
                            </select>
                        </td>
                       
                        <td>
                            <input
                                type="date"
                                id='start_date'
                                class="form-control"
                                name='start_date'
                                value="<?php echo $currentDate?>"
                                min='2024-01-01'
                                max='2027-01-01'
                            >
                        </td>
                        <td>
                            <input
                                type="date"
                                id='start_date'
                                class="form-control"
                                name='expirience_date'
                                value="<?php echo $nextMonthDate?>"
                                min='2024-01-01'
                                max='2027-01-01'
                            >
                        </td>
                        <td> <button type="submit" class="btn btn-primary">Submit</button></td>
                    </tr>
                </tbody>
            </table>   
        </div>
    </form>
</body>
</html>


<?php
                /*if (isset($_SESSION['select_trainings'])) {
                    $trainings = $_SESSION['select_trainings'];
                    foreach ($trainings as $value) {
                        echo "<option value='".$value['training_id']."'>".$value['name']." ".$value['sesions']."</option>";
                    }
                } 
                $sql='UPDATE members SET trainer_id=?, training_id=? WHERE member_id=?';*/
                ?>



