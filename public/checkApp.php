<?php


 
// $to      = '99omar.niang@gmail.com';
// $subject = 'the subject';
// $message = 'hello';
// $headers = 'From: 99omar.niang@gmail.com' . "\r\n" .
//     'Reply-To: 99omar.niang@gmail.com' . "\r\n" .
//     'X-Mailer: PHP/' . phpversion();

// mail($to, $subject, $message, $headers);
//  exit();





if(session_status()==PHP_SESSION_NONE)
{
  session_start();
}

// $datetime1 = date_create(date('d/m/Y')); // Date fixe
// $datetime2 = date_create('2018/08/17'); // Date fixe
// $interval = date_diff($datetime1, $datetime2);
// echo $interval->format('%R%a jours');

 
require "../vendor/autoload.php";
require '../elements/header.php';
 
use App\Database;
use App\User;
use App\Appointement;

$id = $_SESSION['user'];
$bd = new Database();
$pdo = $bd->getPDO("pregnantApp");
$query = $pdo->prepare(" SELECT * FROM users WHERE id=:id");
$query->execute(["id" => $id]);
$user = $query->fetchObject(User::class);


  if ($user->statut == "medecin" && isset($_GET['id'])) {
  
   
 $id_pat=$_GET['id'];
 $pdo=Database::getPDO("pregnantApp");
 $query=$pdo->query("SELECT * FROM appointement WHERE id_pat=$id_pat");
} elseif ($user->statut == "patient") {
    $id = $_SESSION['user'];
    $bd = new Database();
    $pdo = $bd->getPDO("pregnantApp");
    $query = $pdo->prepare(" SELECT * FROM appointement WHERE id_pat=:id");
    $query->execute(["id" => $id]);
  
}
  









//  $id_pat=$_GET['id'];
//  $pdo=Database::getPDO("pregnantApp");
//  $query=$pdo->query("SELECT * FROM appointement WHERE id_pat=$id_pat");
 
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
if ($int<= 10 && $int>=5 ) {
    $theme= "bg-warning";
}
elseif ($int<= 5   ) {
    $theme= "bg-danger";
    $to      = '99omar.niang@gmail.com';
$subject = 'the subject';
$message = 'Bonjour on vous  raapel que votre rendez vous est dans '. $int.' jours';
$headers = 'From: 99omar.niang@gmail.com' . "\r\n" .
    'Reply-To: 99omar.niang@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
}else {
    $theme= "bg-success";
}
     ?>
 
  
 <div class="card text-white <?= $theme ?> mb-3" style="max-width: 18rem;">
  <div class="card-header">le <?=$donne['dateAp'] ?> à <?=$donne['heures'] ?>   <?=$int ?> jours</div>
  <div class="card-body">
    <h5 class="card-title"><?=$donne['nom'] ?></h5>
    <p class="card-text text-white "><?=$donne['description'] ?></p>
  </div>
  </div>
 
 <?php }   ?>
 </div>
 

 


