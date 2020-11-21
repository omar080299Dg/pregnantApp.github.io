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

 $query=$pdo->prepare("INSERT INTO gestation  SET id_pat=?, date_dernieres_regle=?, code_exam=?,date=? ,poids=?,taille=?,HU=?,PA=?,urine=?,HB=?,observations=?,terme_prevu");
 $query->execute([$id_pat,$_POST['date_dernieres_regle'],$_POST['code_exam'],$_POST['date'],$_POST['poids'],$_POST['taille'],$_POST['HU'],$_POST['PA'],$_POST['urine'],$_POST['HB'],$_POST['obervations'],$_POST['terme_prevu']]);


}
  
?>

<div class="container">
<h1>GESTATION</h1>
<form method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Date des dernieres regles</label>
      <input type="text" class="form-control" id="inputEmail4"   name="date_dernieres_regle">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Code examen</label>
      <input type="text" class="form-control" id="inputPassword4"   name="code_exam">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Date examen</label>
    <input type="text" class="form-control" id="inputAddress"  name="date">
  </div>
  <div class="form-group">
    <label for="inputAddress2">poids</label>
    <input type="text" class="form-control" id="inputAddress2"  name="poids">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Taille</label>
      <input type="text" class="form-control" id="inputCity"   name="taille">
    </div>
    <div class="form-group col-md-6">
      <label for="inputCity">HU</label>
      <input type="text" class="form-control" id="inputCity"  name="HU">
    </div>
    <div class="form-group col-md-6">
      <label for="inputCity">Pression Arterielle</label>
      <input type="text" class="form-control" id="inputCity"  name="PA">
    </div>
    <div class="form-group col-md-6">
      <label for="inputCity">urine</label>
      <input type="text" class="form-control" id="inputCity"   name="urine">
    </div>
    <div class="form-group col-md-6">
      <label for="inputCity">HB</label>
      <input type="text" class="form-control" id="inputCity"   name="HB">
    </div>
    <div class="form-group col-md-6">
      <label for="inputCity">Observations</label>
      <input type="text" class="form-control" id="inputCity"   name="observations">
    </div>
    <div class="form-group col-md-6">
      <label for="inputCity">terme prevu</label>
      <input type="text" class="form-control" id="inputCity"   name="terme_prevu">
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
   $query=$pdo->query("SELECT * FROM gestation WHERE id_pat=$id_pat");
  } elseif ($user->statut == "patient") {
      $id = $_SESSION['user'];
      $bd = new Database();
      $pdo = $bd->getPDO("pregnantApp");
      $query = $pdo->prepare(" SELECT * FROM gestation WHERE id_pat=:id");
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
    <p class="card-text">glycemie à jeune  : <?= $donne['glycemieAJeune']?>  0.65 - 1.10g/L</p>
    <p class="card-text">Azotémie  : <?= $donne['azotemie']?> O.10 - 0.50g/L</p>
    <p class="card-text">creatininemie  : <?= $donne['creatininemie']?>  H: 7 - 13g/L F: 5mmg/L </p>
    <p class="card-text">glycemie  : <?= $donne['glycemie']?> negative</p>
    <p class="card-text">albuminurie  : <?= $donne['albuminurie']?> negative</p>
    <p class="card-text">cetonurie  : <?= $donne['cetonurie']?> negative</p>
    <p class="card-text">email labo  : <?= $donne['mailLabo']?>  </p>
     
  </div>
  <div class="card-footer text-muted">
   Laboratoire: <?= $donne['laboratoire']?>
  </div>
</div>
   <?php }?>
   </div>