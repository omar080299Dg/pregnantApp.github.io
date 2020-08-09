<?php
namespace App;
class Appointement{
    private $pdo;
    public function __construct($pdo){
        $this->pdo=$pdo;
    }
    public function makeAppointement($nom,$dateAp,$id_pat,$heures,$description){
        $query= $this->pdo->prepare("INSERT INTO appointement SET nom=?, dateAp=?, id_pat=?,heures=? ,description=?");
        $query->execute([$nom,$dateAp,$id_pat,$heures,$description]);

    }
   
}