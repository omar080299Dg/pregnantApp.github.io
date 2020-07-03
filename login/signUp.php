<?php

use App\Database;

require '../vendor/autoload.php';
$errors = [];
$db = new Database();
$pdo = $db->getPDO("pregnantApp");
$user = new App\Registration($pdo);
if (!empty($_POST)) {

    if (empty($_POST['username']) || !preg_match("/^[a-zA-Z0-98]+$/", $_POST['username'])) {
        $errors['username'] = "le pseudo n'est pas valide (alphanumerique)";
    } else {
        $sql = $pdo->prepare("SELECT  * FROM Users WHERE username=?");
        $sql->execute([$_POST['username']]);
        $user = $sql->fetch();
        if ($user) {
            $errors['username'] = "ce username est deja choisi";
        }
    }
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "le mail entré est invalide";
    }
    if (empty($_POST['password']) || $_POST['password'] != $_POST['passwordConfirmed']) {
        $errors['password'] = "le mot de passe entré est invalide";
    }
}
if ($errors) {
    require 'login.php';
} else {
    $db = new Database();
    $pdo = $db->getPDO("pregnantApp");
    $user = new App\Registration($pdo);
    //  $link =substr(str_shuffle(str_repeat("1234567890abcdefghijklmnopqrstuv",60)),0,50);
    $uploaddir = "../login/upload/";
    $uploadfile = $uploaddir . basename($_FILES['photo']['name']);
    move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile);
    $user->register($_POST['username'], $_POST['email'], $_POST['password'], $_POST['statut'], "upload/" . $_FILES['photo']['name']);
    if ($user) {
        $errors['registeed'] = " votre compte  a ete bien crée, veuillez vous connecter pour y acceder";
        require "login.php";

    }

}
