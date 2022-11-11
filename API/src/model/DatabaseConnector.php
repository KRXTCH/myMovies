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
        $this->host = $_ENV['DB_HOST'];
        $this->port = $_ENV['DB_PORT'];
        $this->dbname   = $_ENV['DB_DATABASE'];
        $this->user = $_ENV['DB_USERNAME'];
        $this->pass = $_ENV['DB_PASSWORD'];

        // $this->host = 'localhost';
        // $this->port = 3306;
        // $this->dbname   = 'movies';
        // $this->user = 'root';
        // $this->pass = '';
        
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
        $list_query = array('CREATE TABLE user (id_user INT NOT NULL AUTO_INCREMENT, prenom VARCHAR(100) NOT NULL, nom VARCHAR(100) NOT NULL, mail VARCHAR(100) NOT NULL, password VARCHAR(100) NOT NULL,isAdmin INT NOT NULL, PRIMARY KEY (id_user))','CREATE TABLE playlist (id_playlist VARCHAR(250) NOT NULL, titre VARCHAR(100), genre INT, affiche_url VARCHAR(500), id_user INT NOT NULL, listemovies VARCHAR(500) NOT NULL, PRIMARY KEY (id_playlist), FOREIGN KEY (id_user) REFERENCES user(id_user))');

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