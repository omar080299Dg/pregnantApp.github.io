<?php
session_start();
require "../vendor/autoload.php";
require '../elements/header.php';
use App\Database;
use App\User;?>
<div class="container">
<form method="POST" action="">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nom</label>
      <input type="text" name="nom" class="form-control" id="inputEmail4" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Prenom</label>
      <input type="text" name="prenom" class="form-control" id="inputPassword4" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Addresse</label>
    <input type="text" name="addresse" class="form-control" id="inputAddress" placeholder="Dakar , rue 231" required>
  </div>
  <div class="form-group">
    <label for="inputAddress2">Proffession</label>
    <input type="text" name="profession" class="form-control" id="inputAddress2" placeholder="Proffession" required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Age</label>
      <input type="text" name="age" class="form-control" id="inputCity" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Ethenie</label>
      <input type="text" name="ethenie" class="form-control" id=" " required>
     
    </div>
    
  </div>
  <div class="form-group col-md-6">
      <label for="inputPassword4">date naiss</label>
      <input type="text" name="date" class="form-control" id="inputPassword4" placeholder="date de naissance" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">lieu naiss</label>
      <input type="text" name="lieu" class="form-control" id="inputPassword4" placeholder="liey de naissance" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">telephone</label>
      <input type="text" name="tel" class="form-control" id="inputPassword4" placeholder="numero de telephone" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Numero en cas d'urgence</label>
      <input type="text" name="telurg" class="form-control" id="inputPassword4" placeholder="personne à appeler" required>
    </div>
  <button type="submit" class="btn btn-primary" style="width: 100%;">valider</button>
</form>
</div>
<?php 
if(!empty($_POST))
{
    $bd = new Database();
    $id=$_GET['id'];
    $pdo = $bd->getPDO("pregnantApp");
    $query=$pdo->prepare(" INSERT INTO infos_perso SET id_user=?, nom_patient=?,prenom_patient=?,age_patient=?, proffession_patient=?,ethenie_patient=?,addresse_patiente=?,date_naissance=?,lieu_naissance=?,tel_patiente=?,num_urg=?");
    $query->execute([$id,$_POST['nom'],$_POST['prenom'],$_POST['age'],$_POST['profession'],$_POST['ethenie'],$_POST['addresse'],$_POST['date'],$_POST['lieu'],$_POST['tel'],$_POST['telurg']]);
    
}