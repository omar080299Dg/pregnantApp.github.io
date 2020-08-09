<?php


// $datetime1 = date_create(date('d/m/Y')); // Date fixe
// $datetime2 = date_create('2018/08/17'); // Date fixe
// $interval = date_diff($datetime1, $datetime2);
// echo $interval->format('%R%a jours');

 
require "../vendor/autoload.php";
require '../elements/header.php';
use App\Database;
use App\User;
use App\Appointement;
 $id_pat=$_GET['id'];
 $pdo=Database::getPDO("pregnantApp");
 $query=$pdo->query("SELECT * FROM appointement WHERE id_pat=$id_pat");
 
 ?>
 <style>
 .container
 {
    display: grid;
    grid-template-columns: 50% 50%;
 }
 </style>
 <div class="container">
 
 <?php while( $donne=$query->fetch()){ 
     $datetime1 = date_create(date('m/d/Y')); 
     $d= $donne['dateAp'] ;
     $datetime2 = date_create($d);
     $interval = date_diff($datetime1, $datetime2);
   $int= $interval->format('%R%a');
   if ($int <= 15 && $int>=10 ) {
    $theme= "bg-secondary";
}elseif ($int<= 10 && $int>=5 ) {
    $theme= "bg-warning";
}
elseif ($int<= 5   ) {
    $theme= "bg-danger";
}else {
    $theme= "bg-success";
}
     ?>
 
  
 <div class="card text-white <?= $theme ?> mb-3" style="max-width: 18rem;">
  <div class="card-header">le <?=$donne['dateAp'] ?> à <?=$donne['heures'] ?></div>
  <div class="card-body">
    <h5 class="card-title"><?=$donne['nom'] ?></h5>
    <p class="card-text text-white "><?=$donne['description'] ?></p>
  </div>
  </div>
 
 <?php }   ?>
 </div>
 

 


