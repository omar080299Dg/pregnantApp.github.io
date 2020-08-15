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

 $query=$pdo->prepare("INSERT INTO analyse_biochimie  SET id_pat=?, glycemieAJeune=?, azotemie=?,creatininemie=? ,glycemie=?,albuminurie=?,cetonurie=?,date=?,laboratoire=?,mailLabo=?");
 $query->execute([$id_pat,$_POST['glycemieAJeune'],$_POST['azotemie'],$_POST['creatininemie'],$_POST['glycemie'],$_POST['albuminurie'],$_POST['cetonurie'],$_POST['date'],$_POST['labo'],$_POST['mailLabo']]);


}
  
?>
<div class="container">
<h1>BIOCHIMIE</h1>
<form method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Glycémie à jeune</label>
      <input type="text" class="form-control" id="inputEmail4"  placeholder="0.65 - 1.10g/L" name="glycemieAJeune">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Azotémie</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="O.10 - 0.50g/L" name="azotemie">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Créatininémie</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="H: 7 - 13g/L F: 5mmg/L" name="creatininemie">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Glycémie</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="glycemie negative" name="glycemie">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Albuminerie</label>
      <input type="text" class="form-control" id="inputCity" placeholder="albuminerie negative" name="albuminurie">
    </div>
    <div class="form-group col-md-6">
      <label for="inputCity">Cétonurie</label>
      <input type="text" class="form-control" id="inputCity" placeholder="cetonurie negative" name="cetonurie">
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
   $query=$pdo->query("SELECT * FROM analyse_biochimie WHERE id_pat=$id_pat");
  } elseif ($user->statut == "patient") {
      $id = $_SESSION['user'];
      $bd = new Database();
      $pdo = $bd->getPDO("pregnantApp");
      $query = $pdo->prepare(" SELECT * FROM analyse_biochimie WHERE id_pat=:id");
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