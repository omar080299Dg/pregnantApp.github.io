<?php
require '../elements/header.php';?>
<link rel="stylesheet" href="css/patientes.css">
<?php require "../vendor/autoload.php";
use App\Database;
use App\User;
// dd($_SESSION);
// exit();
$_SESSION['user'] = $user->id;

$db = new Database();
$pdo = $db->getPDO("pregnantApp");
$query = $pdo->query("SELECT * FROM Users WHERE statut= 'patient'");?>
<body>
    <div class="container">
    <h1>   cliquez sur le pseudo d'une patiente pour ouvrir son dossier</h1>
     <div class="container-pat"> <?php
while ($donnee = $query->fetch()) {
    ?>
     <div class="card">
         <div class="img">
            <img src="<?php echo $donnee['lien_img'] ?>" alt="" width="400px" height="400px">

         <a class="ref" href="/home?id=<?=$donnee['id']?>&med=<?=$_SESSION['user']?>"><span><?=$donnee['username']?></span></a>
     </div>
<?php }?>
    </div></div>
</body>
</html>
