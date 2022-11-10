<?php

class User
{

    private $id_user;
    private $nom;
    private $prenom;
    private $mail;
    private $password;
    private $listPlaylist;
  
    public function __construct($nom, $prenom, $mail, $password, $listPlaylist = array())
    {
        $this->id_user = null;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->password = $password;
        $this->listPlaylist = $listPlaylist;
  
    }

    public function createUser($db)
    {
        try{
            $params = array(':nom' => $this->nom, ':prenom' => $this->prenom, ':mail' => $this->mail, ':password' => $this->password);
     
            $resultat = $db->getConnection()->prepare("INSERT INTO user (prenom, nom, mail, password) VALUES (:prenom,:nom,:mail,:password)");
                
            $resultat->execute($params);

            print "Création du user: [$this->prenom, $this->nom, $this->mail, $this->password] <br/>";

        }catch(PDOException $e){
            print "Erreur : ". $e->getMessage().'<br/>';
            die;
        }
    }

    public function updateUser($db){

        try{
            $params = array(':nom' => $this->nom, ':prenom' => $this->prenom, ':mail' => $this->mail, ':password' => $this->password, ':id_user' => $this->id_user);
     
            $resultat = $db->getConnection()->prepare("UPDATE user SET prenom = :prenom, nom = :nom, mail = :mail, password = :password WHERE id_user = :id_user");
            
            $resultat->execute($params);

            print "Modification du user: [$this->id_user] <br/>";

        }catch(PDOException $e){
            print "Erreur : ". $e->getMessage().'<br/>';
            die;
        }
    }

    public function deleteUser($db){

        try{
            $params = array(':id_user' => $this->id_user);
     
            $resultat = $db->getConnection()->prepare("DELETE FROM user WHERE id_user = :id_user");
            
            $resultat->execute($params);

            print "Suppression du user: [$this->id_user] <br/>";

        }catch(PDOException $e){
            print "Erreur : ". $e->getMessage().'<br/>';
            die;
        }
    }

    public function createPlaylist($playlist,$db)
    {   
        try{
            $params = array(':titre' => $playlist->getTitre(), ':genre' => $playlist->getGenre(), ':id_user' => $this->id_user);
    
            $resultat = $db->getConnection()->prepare("INSERT INTO playlist (titre, genre, id_user) VALUES (:titre,:genre,:id_user)");
                
            $resultat->execute($params);

            print "Création de la playlist <br/>";

            if ($playlist->getListMovies() != null)
            {
                foreach($playlist->getListMovies() as $movie)
                {
                    $params = array(':id_playlist' => $playlist->getIdPlaylist(), ':idFilm' => $movie->getIdFilm());
    
                    $resultat = $db->getConnection()->prepare("INSERT INTO movie (id_playlist, id_film) VALUES (:id_playlist,:idFilm)");
                        
                    $resultat->execute($params);

                    array_push($this->listPlaylist, $playlist);

                    print "Création movie <br/>";
                }
            }

        }catch(PDOException $e){
            print "Erreur : ". $e->getMessage().'<br/>';
            die;
        } 
    }

    //getter and setter
    public function getIdUser(){
        return $this->id_user;
    }

    public function setIdUser($id_user){
        $this->id_user = $id_user;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    public function getNom(){
        return $this->nom;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function getMail(){
        return $this->mail;
    }

    public function setMail($mail){
        $this->mail = $mail;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getListPlaylist(){
        return $this->listPlaylist;
    }

    public function setListPlaylist($listPlaylist){
        $this->listPlaylist = $listPlaylist;
    }
}