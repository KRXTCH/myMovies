<?php

class User
{

    private $id;
    private $nom;
    private $prenom;
    private $mail;
    private $password;
  
    public function __construct($nom, $prenom, $mail, $password)
    {
        $this->id = null;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->password = $password;
  
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
            $params = array(':nom' => $this->nom, ':prenom' => $this->prenom, ':mail' => $this->mail, ':password' => $this->password, ':id' => $this->id);
     
            $resultat = $db->getConnection()->prepare("UPDATE user SET prenom = :prenom, nom = :nom, mail = :mail, password = :password WHERE id_user = :id");
            
            $resultat->execute($params);

            print "Modification du user: [$this->id] <br/>";

        }catch(PDOException $e){
            print "Erreur : ". $e->getMessage().'<br/>';
            die;
        }
    }

    public function deleteUser($db){

        try{
            $params = array(':id' => $this->id);
     
            $resultat = $db->getConnection()->prepare("DELETE FROM user WHERE id_user = :id");
            
            $resultat->execute($params);

            print "Suppression du user: [$this->id] <br/>";

        }catch(PDOException $e){
            print "Erreur : ". $e->getMessage().'<br/>';
            die;
        }
    }

    //getter and setter
    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
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
        return $this->id;
    }

    public function setPassword($password){
        $this->password = $password;
    }
}