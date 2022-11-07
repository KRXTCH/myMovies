<?php

class DatabaseConnector
{
    private $host;
    private $port;
    private $dbname;
    private $user;
    private $pass;
    private $connection = null;

    public function __construct()
    {
        // $this->host = getenv('DB_HOST');
        // $this->port = getenv('DB_PORT');
        // $this->dbname   = getenv('DB_DATABASE');
        // $this->user = getenv('DB_USERNAME');
        // $this->pass = getenv('DB_PASSWORD');

        $this->host = 'localhost';
        $this->port = 3306;
        $this->dbname   = 'mymovie';
        $this->user = 'root';
        $this->pass = '';
        
        try
        {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->user, $this->pass);
            echo 'acces succesfull <br/>';
        }
        catch(PDOException $e)
        {
            print "Erreur : ". $e->getMessage().'<br/>';
            die;
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function createTables()
    {
        $list_query = array('CREATE TABLE user (id_user INT PRIMARY KEY NOT NULL AUTO_INCREMENT, prenom VARCHAR(100) NOT NULL, nom VARCHAR(100) NOT NULL, mail VARCHAR(100) NOT NULL, password VARCHAR(100) NOT NULL)','CREATE TABLE playlist (id_playlist INT PRIMARY KEY NOT NULL AUTO_INCREMENT, id_film INT NOT NULL, genre VARCHAR(100))');

        foreach ($list_query as $query)
        {
            try
            {
                $resultat = $this->connection->prepare($query);
                $resultat->execute();
                print "Create table <br/>";
            }
            catch(PDOException $e)
            {
                print "Erreur : ". $e->getMessage().'<br/>';
                die;
            }
        }     
        
    }

}