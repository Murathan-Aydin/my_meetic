<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Database
{
    private $host = 'localhost';
    private $dbname = 'mymeetic';
    private $user = 'root';
    private $password = 'azer';
    private $bdd;

    public function __construct()
    {
        try {
            $this->bdd = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->user, $this->password);
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Erreur Base de Données : ' . $e->getMessage() . PHP_EOL;
        }
    }

    public function getConnection()
    {
        return $this->bdd;
    }
}

$db = new Database();
$pdo = $db->getConnection();
