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


if ($user->statut == "medecin" && isset($_GET['id'])):
if($_POST){ 
 $id_pat=$_GET['id'];
 $pdo=Database::getPDO("pregnantApp");

 $query=$pdo->prepare("INSERT INTO parasitologie  SET id_pat=?, goutteEpaisse=?,DP=?, date=?,laboratoire=?,mailLabo=?");
 $query->execute([$id_pat,$_POST['goutteEpaisse'],$_POST['DP'],$_POST['date'],$_POST['labo'],$_POST['mailLabo']]);


}
  
?>
<div class="container">
<h1>BIOCHIMIE</h1>
<form method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Goutte Epaisse </label>
      <input type="text" class="form-control" id="inputEmail4"  name="goutteEpaisse">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">DP</label>
      <input type="text" class="form-control" id="inputEmail4"    name="DP">
    </div>
   
    <div class="form-group col-md-6">
      <label for="inputCity">Laboratoire</label>
      <input type="text" class="form-control" id="inputCity" placeholder="Laboratoire" name="labo">
    </div>
    <div class="form-group col-md-6">
      <label for="inputCity">eamil</label>
      <input type="text" class="form-control" id="inputCity" placeholder="email labo" name="mailLabo">
    </div>
    <div class="form-group col-md-6">
      <label for="inputCity">Date</label>
      <input type="text" class="form-control" id="inputCity" placeholder="date analyse" name="date">
    </div>
    
    
  </div>
  <button type="submit" class="btn btn-primary">Valider</button>
  </div>
  
</form></div>
<div class="container">
  <?php endif;
  $id = $_SESSION['user'];
  $bd = new Database();
  $pdo = $bd->getPDO("pregnantApp");
  $query = $pdo->prepare(" SELECT * FROM users WHERE id=:id");
  $query->execute(["id" => $id]);
  $user = $query->fetchObject(User::class);
  
  
    if ($user->statut == "medecin" && isset($_GET['id'])) {
    
     
   $id_pat=$_GET['id'];
   $pdo=Database::getPDO("pregnantApp");
   $query=$pdo->query("SELECT * FROM parasitologie WHERE id_pat=$id_pat");
  } elseif ($user->statut == "patient") {
      $id = $_SESSION['user'];
      $bd = new Database();
      $pdo = $bd->getPDO("pregnantApp");
      $query = $pdo->prepare(" SELECT * FROM parasitologie WHERE id_pat=:id");
      $query->execute(["id" => $id]);
    
  }
   while($donne=$query->fetch()) { 
  ?>
  <div class="card text-center">
  <div class="card-header">
  <?= $donne['date']?>
  </div>
  <div class="card-body">
    <h5 class="card-title">Résultats</h5>
    <p class="card-text"> Goutte épaisse: <?= $donne['goutteEpaisse']?>   </p>
    <p class="card-text"> DP : <?= $donne['DP']?>   </p>
    <p class="card-text">email labo  : <?= $donne['mailLabo']?>  </p>
     
  </div>
  <div class="card-footer text-muted">
   Laboratoire: <?= $donne['laboratoire']?>
  </div>
</div>
   <?php }?>
   </div>