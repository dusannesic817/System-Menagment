<?php

require_once 'app/database/dbConn.php';
require_once 'app/classes/Member.php';



$member= new Member();

$limit=5;

if(isset($_GET['page'])){
  $page = $_GET['page'];
} else {
  $page = 1;
}

$list=$member->list($limit,$page);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public/css/style.css">
    <title>List of Members</title>
</head>
<body>
    <div class="container mt-5">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Number</th>
            <th scope="col">Type of Training</th>
            <th scope="col">Training price</th>
            <th scope="col">Trainer</th>
            <th scope="col">Created at</th>
          </tr>
        </thead>
        <tbody>
            <?php
            foreach($list as $value){
            ?>
          <tr>
            <th><?php echo $value['member_id']; ?></th>
            <td> <?php echo $value['first_name'] ." ".$value['last_name'] ?> </td>
            <td> <?php echo $value['email'] ?></td>
            <td><?php echo $value['number'] ?></td>
            <td> <?php echo $value['training_name'] ." ".$value['training_session'] ?> </td>
            <td> <?php echo $value['training_price'] ?></td>
            <td> <?php echo $value['trainer_first_name'] ." ".$value['trainer_last_name'] ?></td>
            <td>
              <?php 
                $created_at =  $value['created_at'];
                $created= date("d.m.Y",strtotime($created_at));
                echo $created;
              ?>
            </td>
          </tr>
            <?php }?>

            <?php 
                  $max= $member->count();
                  foreach($max as $total){}

                  $totalPages=ceil($total/ $limit);
                  $previous= $page -1;

                  if($page<$totalPages){
                    $next= $page+1;
                  }else{
                    $next=$totalPages;
                  }
            ?>
          </tbody>
      </table>
    </div>
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <li class="page-item">
            <a class="page-link" href="member_list.php?page=<?php echo $previous?>">Previous</a>
          </li>
        <?php for($i=1; $i<=$totalPages; $i++){?>
          <li class="page-item"><a class="page-link" href="member_list.php?page=<?php echo $i?>"><?php echo $i?></a></li>
      <?php }?>
          <li class="page-item">
            <a class="page-link" href="member_list.php?page=<?php echo $next?>">Next</a>
          </li>
        </ul>
      </nav>
  </body>
  </html>