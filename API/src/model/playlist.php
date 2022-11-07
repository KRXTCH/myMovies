<?php

class Playlist
{

    private $id;
    private $titre;
    private $genre;
    private $listIdFilm;
    

  
    public function __construct($titre, $genre, $listIdFilm)
    {
        $this->id = null;
        $this->titre = $titre;
        $this->genre = $genre;
        $this->listIdFilm = $listIdFilm;
    }

    public function createPlaylist($db)
    {
        foreach($this->listIdFilm as $idFilm)
        {
            try{
                $params = array(':titre' => $this->titre, ':genre' => $this->genre, ':idFilm' => $idFilm);
         
                $resultat = $db->getConnection()->prepare("INSERT INTO playlist (titre, genre, id_film) VALUES (:titre,:genre,:idFilm)");
                    
                $resultat->execute($params);
    
                print "Création de la playlist: [$this->titre, $this->genre, $idFilm] <br/>";
    
            }catch(PDOException $e){
                print "Erreur : ". $e->getMessage().'<br/>';
                die;
            }
        }  
    }

    public function updatePlaylist($db){
        $tableDeleteElement = array();
        $tableAddElement = array();
        try
        {
            $params = array(':id' => $this->id );
     
            $resultat = $db->getConnection()->prepare("SELECT id_film FROM playlist WHERE id_playlist = :id");
            
            $resultat->execute($params);

            $tableIdFilm = $resultat->fetchAll(PDO::FETCH_ASSOC);

            foreach($tableIdFilm as $idFilm)
            {
                if (!in_array($idFilm, $this->listIdFilm))
                {
                    array_push($tableDeleteElement, $idFilm);
                }
            }

            foreach($this->listIdFilm as $idFilm)
            {
                if (!in_array($idFilm, $tableIdFilm))
                {
                    array_push($tableAddElement, $idFilm);
                }
            }

            foreach($tableAddElement as $element){

                $params = array(':titre' => $this->titre, ':genre' => $this->genre, ':idFilm' => $element);
     
                $resultat = $db->getConnection()->prepare("INSERT INTO playlist (titre, genre, id_film) VALUES (:titre,:genre,:idFilm)");
                
                $resultat->execute($params);

                print "Insertion de ligne <br/>";
            }

            foreach($tableDeleteElement as $element){

                $params = array(':idFilm' => $element);
     
                $resultat = $db->getConnection()->prepare("DELETE FROM playlist WHERE id_film = :idFilm");
                
                $resultat->execute($params);

                print "Suppresion de ligne <br/>";
            }

        }catch(PDOException $e){
            print "Erreur : ". $e->getMessage().'<br/>';
            die;
        }
    }

    public function deletePlaylist($db){

        try{
            $params = array(':id' => $this->id);
     
            $resultat = $db->getConnection()->prepare("DELETE FROM playlist WHERE id_playlist = :id");
            
            $resultat->execute($params);

            print "Suppression de la playlist: [$this->id] <br/>";

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

    public function getTitre(){
        return $this->titre;
    }

    public function setTitre($titre){
        $this->titre = $titre;
    }

    public function getGenre(){
        return $this->genre;
    }

    public function setGenre($genre){
        $this->genre = $genre;
    }

    public function getListIdFilm(){
        return $this->ListIdFilm;
    }

    public function setListIdFilm($ListIdFilm){
        $this->ListIdFilm = $ListIdFilm;
    }
}