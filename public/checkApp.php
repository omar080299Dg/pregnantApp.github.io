<?php
if(session_status()==PHP_SESSION_NONE)
{
  session_start();
}
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
elseif ($int<= 5  && $int>0 ) {
    $theme= "bg-danger";
    $to      = '99omar.niang@gmail.com';
$subject = 'the subject';
$message = 'Bonjour on vous  raapel que votre rendez vous est dans '. $int.' jours';
$headers = 'From: 99omar.niang@gmail.com' . "\r\n" .
    'Reply-To: 99omar.niang@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
}elseif ($int<=0) {
  $theme= "bg-dark mb-3";
  $int=0;

}
else {
    $theme= "bg-success";
}
     ?>

  
 <div class="card text-white <?= $theme ?> mb-3" style="max-width: 18rem;">
  <div class="card-header">le <?= date('d/m/y',strtotime($donne['dateAp'] ))?> à <?=$donne['heures'] ?>  </div>
  <div class="card-body">
    <h5 class="card-title text-bold "><?=$donne['nom'] ?></h5>
    <p class="card-text text-white "><?=$donne['description'] ?></p>
  </div>
     <span> Il vous reste <?=$int ?> jours</span>
  </div>
 
 <?php }   ?>
 </div>
 

 


