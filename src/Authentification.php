<?php
namespace App;

// require "../vendor/autoload.php";
class Authentification
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function login($username, $password, $statut): ?User
    {
        $query = Database::getPDO("pregnantApp")->prepare("SELECT * FROM Users WHERE username=:username");
        $query->execute(['username' => $username]);
        $user = $query->fetchObject(User::class);
   
        // if ($user === false) {
        //     return null;
        // }
        // dd($password);
        // exit();
        // dd( password_verify($user->passwordd ,$password));
        // exit();
        
        if (($user->passwordd ==$password)) {
            // if (session_status() == PHP_SESSION_NONE) {
            //     session_start();
            // }
            $_SESSION['user'] = $user->id;
      
            return $user;
        }
        return null;
    }
}
