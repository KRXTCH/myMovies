<?php

require_once 'src\model\databaseConnector.php';

class Database
{
    public function createDatabase()
    {
        try {
            $host = $_ENV['DB_HOST'];
            $user = $_ENV['DB_USERNAME'];
            $pwd = $_ENV['DB_PASSWORD'];
            $db = $_ENV['DB_DATABASE'];

            $dbh = new PDO("mysql:host=$host", $user, $pwd);
            $dbh->exec("CREATE DATABASE IF NOT EXISTS `$db`");
            $dbh->query("use `$db`");
            $dbh->exec(
                "CREATE TABLE IF NOT EXISTS `user` (
                    `id_user` INT NOT NULL AUTO_INCREMENT,
                    `firstname` VARCHAR(100) NOT NULL,
                    `lastname` VARCHAR(100) NOT NULL,
                    `email` VARCHAR(100) NOT NULL,
                    `password` VARCHAR(100) NOT NULL,
                    `is_admin` INT NOT NULL, PRIMARY KEY (id_user),
                    `list_playlist` nvarchar(500)
                )"
            );
            $dbh->exec(
                "CREATE TABLE IF NOT EXISTS `playlist` (
                    `id_playlist` INT NOT NULL AUTO_INCREMENT,
                    `name` VARCHAR(100) NOT NULL,
                    `cover_url` nvarchar(500) NOT NULL,
                    `id_user` INT NOT NULL,
                    `is_private`INT NOT NULL,
                    `list_movies` VARCHAR(500), PRIMARY KEY (id_playlist),
                    FOREIGN KEY (id_user) REFERENCES user(id_user)
                )"
            );
        } catch (PDOException $e) {
            print "Erreur : " . $e->getMessage() . '<br/>';
            die;
        }
    }
}
