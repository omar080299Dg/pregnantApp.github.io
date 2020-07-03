<?php
namespace App;

use PDO;

class Database
{
    private $db_name;
    private $username;
    private $password;
    private $host;
    private $pdo;
    public static $connect;
    // public function __construct($db_name, $username = "root", $password = "", $host = "localhost")
    // {
    //     $this->db_name = $db_name;
    //     $this->username = $username;
    //     $this->password = $password;
    //     $this->host = $host;

    // }
    public static function getPDO($dbname): PDO
    {

        // if (self::$connect) {
        self::$connect = new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8", "root", "");
        // [
        //     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        // ]);
        self::$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return self::$connect;

    }

}
