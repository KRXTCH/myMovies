<?php

class DatabaseConnector
{

    private $host;
    private $dbname;
    private $user;
    private $pass;
    private $connection = null;

    public function __construct()
    {
        $this->host = $_ENV['DB_HOST'];
        $this->dbname = $_ENV['DB_DATABASE'];
        $this->user = $_ENV['DB_USERNAME'];
        $this->pass = $_ENV['DB_PASSWORD'];

        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
        } catch (PDOException $e) {
            print "Erreur : " . $e->getMessage() . '<br/>';
            die;
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
