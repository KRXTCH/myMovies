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
        $list_query = array('CREATE TABLE user (id_user INT NOT NULL AUTO_INCREMENT, prenom VARCHAR(100) NOT NULL, nom VARCHAR(100) NOT NULL, mail VARCHAR(100) NOT NULL, password VARCHAR(100) NOT NULL, PRIMARY KEY (id_user))','CREATE TABLE playlist (id_playlist INT NOT NULL AUTO_INCREMENT, titre VARCHAR(100), genre VARCHAR(100), id_user INT NOT NULL, PRIMARY KEY (id_playlist), FOREIGN KEY (id_user) REFERENCES user(id_user))','CREATE TABLE movie (id_movie INT NOT NULL AUTO_INCREMENT, id_playlist INT NOT NULL, id_film INT NOT NULL, PRIMARY KEY (id_movie), FOREIGN KEY (id_playlist) REFERENCES playlist(id_playlist))');

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