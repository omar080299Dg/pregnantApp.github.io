<?php
session_start();
require "../vendor/autoload.php";
require '../elements/header.php';
use App\Database;
use App\User;

$id = $_SESSION['user'];
$bd = new Database();
$pdo = $bd->getPDO("pregnantApp");
$query = $pdo->prepare(" SELECT * FROM users WHERE id=:id");
$query->execute(["id" => $id]);
$user = $query->fetchObject(User::class);

?>
 <div class="container">
     <div class="title alert alert-success">
         <h1> Infomations personnelles de la patiente</h1>
     </div>
 </div>
 <?php if ($user->statut == "medecin" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $bd = new Database();
    $pdo = $bd->getPDO("pregnantApp");
    $query = $pdo->prepare(" SELECT * FROM infos_perso WHERE id_user=:id");
    $query->execute(["id" => $id]);
    $pat = $query->fetchAll();
} elseif ($user->statut == "patient") {
    $id = $_SESSION['user'];
    $bd = new Database();
    $pdo = $bd->getPDO("pregnantApp");
    $query = $pdo->prepare(" SELECT * FROM infos_perso WHERE id_user=:id");
    $query->execute(["id" => $id]);
    $pat = $query->fetch();
}
 ?>
<div class="container">
<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col"><?= $pat['nom_patient']?></th>
       
      

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Prenom</th>
      <td><?= $pat['prenom_patient']?></td>
    </tr>
    <tr>
      <th scope="row">Age</th>
      <td><?= $pat['age_patient']?></td>
    </tr>
    <tr>
      <th scope="row">Prefession</th>
      <td><?= $pat['proffession_patient']?> </td>
    </tr>
    <tr>
      <th scope="row">Ethnie</th>
      <td><?= $pat['ethenie_patient']?> </td>
    </tr>
    <tr>
      <th scope="row">Addresse</th>
      <td><?= $pat['addresse_patiente']?> </td>
    </tr>
    <tr>
      <th scope="row">Date et lieu de naissance</th>
      <td><?= $pat['date_naissance']." à ".$pat['lieu_naissance']?>  </td>
    </tr>
    <tr>
      <th scope="row">telephone</th>
      <td><?= $pat['tel_patiente']?> </td>
    </tr>
    <tr>
      <th scope="row">Numéro d'urgnce</th>
      <td><?= $pat['num_urg']?> </td>
    </tr>
    

  </tbody>
</table>
<?php if($user->statut=="medecin"){?>
<div style="display: flex; justify-content:space-between">
<?php if($pat!=null){?>
    <a href="/addInfo?id=<?=$_GET['id'] ?>" class="btn btn-primary disabled">nouveau</a>
<?} else{?>
    <a href="/addInfo?id=<?=$_GET['id'] ?>" class="btn btn-primary  ">nouveau</a>
<?php } ?>
<a href="#" class="btn btn-danger">modifier</a>
</div>
<?php }
elseif($user->statut=="patient"){?>
<div style="display: flex; justify-content:space-between">
<a href="/addInfo" class="btn btn-primary disabled"  disabled="disabled">nouveau</a>
<a href="#" class="btn btn-danger disabled" disabled="disabled">modifier</a>
</div>
<?php }?>
</div>