<?php
namespace App;
class Registration
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function register($username, $email, $password,$statut,$lien ) 
    {
      $req= $this->pdo->prepare("INSERT INTO Users SET username=?, email=?, passwordd=?,statut=? ,lien_img=?");
    
      
      // $passHashed= password_hash($password,PASSWORD_BCRYPT);
      $req->execute([$username,$email,$password,$statut,$lien]);
      // $id=$this->pdo->lastInsertid();
      // mail($email,"confirmation de compte", "veuillez cliquer sur ce line pour achever la creation de votre compte\n\n  http://localhost:8000/signUp?id=$id&link=$link");
      // require "login.php";

    }
}
