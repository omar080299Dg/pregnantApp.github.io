<?php
if(session_status()==PHP_SESSION_NONE)
{
  session_start();
}
require "../vendor/autoload.php";
require '../elements/header.php';
use App\Database;
use App\User;

$id = $_SESSION['user'];
$id = $_GET['id'];
$bd = new Database();
$pdo = $bd->getPDO("pregnantApp");
$query = $pdo->prepare(" SELECT * FROM infos_perso WHERE id_user=:id");
$query->execute(["id" => $id]);
$pat = $query->fetch (); ?>
<div class="container">
<form method="POST" action="">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nom</label>
      <input type="text" name="nom" value="<?= $pat["nom_patient"]?>"  class="form-control" id="inputEmail4" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Prenom</label>
      <input type="text" name="prenom" value="<?= $pat["prenom_patient"]?> "  class="form-control" id="inputPassword4" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Addresse</label>
    <input type="text" name="addresse" value="<?= $pat["addresse_patiente"]?> " class="form-control" id="inputAddress" placeholder="Dakar , rue 231" required>
  </div>
  <div class="form-group">
    <label for="inputAddress2">Proffession</label>
    <input type="text" name="profession" value="<?= $pat["proffession_patient"]?> " class="form-control" id="inputAddress2" placeholder="Proffession" required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Age</label>
      <input type="text" name="age" value="<?= $pat["age_patient"]?> " class="form-control" id="inputCity" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Ethenie</label>
      <input type="text" name="ethenie"  value="<?= $pat["ethenie_patient"]?> "  class="form-control" id=" " required>
     
    </div>
    
  </div>
  <div class="form-group col-md-6">
      <label for="inputPassword4">date naiss</label>
      <input type="text" name="date" value="<?= $pat["date_naissance"]?> " class="form-control" id="inputPassword4" placeholder="date de naissance" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">lieu naiss</label>
      <input type="text" name="lieu"  value="<?= $pat["lieu_naissance"]?> "class="form-control" id="inputPassword4" placeholder="liey de naissance" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">telephone</label>
      <input type="text" name="tel" value="<?= $pat["tel_patiente"]?> " class="form-control" id="inputPassword4" placeholder="numero de telephone" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Numero en cas d'urgence</label>
      <input type="text" name="telurg" value="<?= $pat["num_urg"]?> "class="form-control" id="inputPassword4" placeholder="personne à appeler" required>
    </div>
  <button type="submit" class="btn btn-primary" style="width: 100%;">valider</button>
</form>
</div>
<?php
 
if($_POST['nom'])
{
    $bd = new Database();
    $id=$_GET['id'];
    $nompat  =$_POST['nom'];
    $bd = new Database();
    $pdo = $bd->getPDO("pregnantApp");
    $query=$pdo->query(" UPDATE infos_perso SET   nom_patient= '.$nompat.' WHERE id=$id");
}
    
     
 