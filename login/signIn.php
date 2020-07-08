<?php
 session_start();
$errors = [];
use App\Authentification;
use App\Database;
require "../vendor/autoload.php";
// $dsn= new Database();
$pdo = Database::getPDO("pregnantApp");
$regitration = new Authentification($pdo);
if (!empty($_POST['username']) && isset($_POST['password']) && isset($_POST['statut'])) {
    $user = $regitration->login($_POST['username'], $_POST['password'], $_POST['statut']);

    if ($user) {
        $_SESSION['user'] = $user->id;

       
        if($_POST['statut']=='patient')
        {   $_SESSION['user'] = $user->id;
        require '../public/home.php';
        }
        else
        { $_SESSION['user'] = $user->id;
          require '../public/patientes.php';
        }
    } else {
        $errors['loggin'] = " veillez siasir les bonnes informations";
        require 'login.php';
    }
}
