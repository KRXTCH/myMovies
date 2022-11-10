<?php

class User
{

    private $id_user;
    private $nom;
    private $prenom;
    private $mail;
    private $password;
    private $isAdmin;
    private $listPlaylist;
  
    public function __construct($nom, $prenom, $mail, $password,$isAdmin = 0, $listPlaylist = array())
    {
        $this->id_user = null;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->password = $password;
        $this->isAdmin = $isAdmin;
        $this->listPlaylist = $listPlaylist;
  
    }

    public function createUser($db)
    {
        try{
            
            $passhash = password_hash($this->password, PASSWORD_DEFAULT);

            $params = array(':nom' => $this->nom, ':prenom' => $this->prenom, ':mail' => $this->mail, ':password' => $passhash, ':isAdmin' => $this->isAdmin);
     
            $resultat = $db->getConnection()->prepare("INSERT INTO user (prenom, nom, mail, password, isAdmin) VALUES (:prenom,:nom,:mail,:password,:isAdmin)");
                
            $resultat->execute($params);

            print "Création du user: [$this->prenom, $this->nom, $this->mail, $passhash] <br/>";

        }catch(PDOException $e){
            print "Erreur : ". $e->getMessage().'<br/>';
            die;
        }
    }

    public function updateUser($db){

        try{

            $passhash = password_hash($this->password, PASSWORD_DEFAULT);

            $params = array(':nom' => $this->nom, ':prenom' => $this->prenom, ':mail' => $this->mail, ':password' => $passhash, ':id_user' => $this->id_user);
     
            $resultat = $db->getConnection()->prepare("UPDATE user SET prenom = :prenom, nom = :nom, mail = :mail, password = :password WHERE id_user = :id_user");
            
            $resultat->execute($params);

            print "Modification du user: [$this->id_user] <br/>";

        }catch(PDOException $e){
            print "Erreur : ". $e->getMessage().'<br/>';
            die;
        }
    }


    public function createPlaylist($playlist,$db)
    {   
        try{

            if ($playlist != null)
            {
                $params = array(':id_playlist' => $playlist->getIdPlaylist(),':titre' => $playlist->getTitre(), ':genre' => $playlist->getGenre(), ':id_user' => $this->id_user,':liste' => json_encode($playlist->getListMovies()));
    
                $resultat = $db->getConnection()->prepare("INSERT INTO playlist (id_playlist,titre, genre, id_user, listemovies) VALUES (:id_playlist,:titre,:genre,:id_user,:liste)");
                    
                $resultat->execute($params);

                array_push($this->listPlaylist, $playlist);

                print "Création de la playlist <br/>";
            }

        }catch(PDOException $e){
            print "Erreur : ". $e->getMessage().'<br/>';
            die;
        } 
    }

    public function userCheckDb($db)
    {   
        try{

            $id_user = null;
            $view = new ViewAllUser();
            $resultat = $view->getAllUser($db);

            foreach($resultat as $row)
            {
                if(($row->mail == $this->mail) and (password_verify($this->password, $row->password)))
                {
                    $id_user = $row->id_user;
                    break;
                }
            }

            return $id_user;

        }catch(PDOException $e){
            print "Erreur : ". $e->getMessage().'<br/>';
            die;
        } 
    }
    public function userIsAdmin()
    {   
        if($this->isAdmin = 1)
        {
            return 1;
        }
        else
        {
            return 0;
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

    public function getIsAdmin(){
        return $this->isAdmin;
    }

    public function setIsAdmin($isAdmin){
        $this->isAdmin = $isAdmin;
    }

    public function getListPlaylist(){
        return $this->listPlaylist;
    }

    public function setListPlaylist($listPlaylist){
        $this->listPlaylist = $listPlaylist;
    }
}