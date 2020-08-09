<?php
use App\Authentification;
use App\Database;
use App\Appointement;
require "../vendor/autoload.php";
$pdo = Database::getPDO("pregnantApp");
$appoitement = new Appointement($pdo);
$id_pat=$_GET['med'];
$appoitement->makeAppointement($_POST['name'],$_POST['dateApp'],$_POST['timeApp'],$id_pat,$_POST['timeApp'],$_POST['descApp']);

 