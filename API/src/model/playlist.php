<?php

class Playlist
{

    private $id_playlist;
    private $titre;
    private $genre;
    private $listMovies;
    

  
    public function __construct($titre, $genre, $listMovies = array())
    {
        $this->id_playlist = uniqid();
        $this->titre = $titre;
        $this->genre = $genre;
        $this->listMovies = $listMovies;
    }

    public function updatePlaylist($db){

        try{
            $params = array(':titre' => $this->titre, ':genre' => $this->genre,':id_playlist' => $this->id_playlist,':liste' => json_encode($this->listeMovies));
     
            $resultat = $db->getConnection()->prepare("UPDATE playlist SET titre = :titre, genre = :genre, listemovies = :liste WHERE id_playlist = :id_playlist");
            
            $resultat->execute($params);

            print "Modification du user: [$this->id_playlist] <br/>";

        }catch(PDOException $e){
            print "Erreur : ". $e->getMessage().'<br/>';
            die;
        }
    }

    public function addMoviePlaylist($id_film, $db)
    {
        try{        
            array_push($this->listMovies, $id_film);
            $this->updatePlaylist($db);

        }catch(PDOException $e){
            print "Erreur : ". $e->getMessage().'<br/>';
            die;
        }  
    }

    public function deleteMoviePlaylist ($id_film, $db)
    {
        try{

            if (in_array($id_film, $this->listMovies))
            {
                $key = array_search($id_film, $this->listMovies);
                array_splice($this->listMovies, $key, 1);
                $this->updatePlaylist($db);
                print "Suppresion movie: [$id_film] <br/>";
            }

        }catch(PDOException $e){
            print "Erreur : ". $e->getMessage().'<br/>';
            die;
        }  
    }

    public function deletePlaylist($db){

        try{
            $params = array(':id_playlist' => $this->id_playlist);
     
            $resultatTablePlaylist = $db->getConnection()->prepare("DELETE FROM playlist WHERE id_playlist = :id_playlist");
            
            $resultatTablePlaylist->execute($params);

            print "Suppression de la playlist: [$this->id_playlist] <br/>";

        }catch(PDOException $e){
            print "Erreur : ". $e->getMessage().'<br/>';
            die;
        }
    }

    //getter and setter
    public function getIdPlaylist(){
        return $this->id_playlist;
    }

    public function setIdPlaylist($id_playlist){
        $this->id_playlist = $id_playlist;
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

    public function getListMovies(){
        return $this->listMovies;
    }

    public function setListMovies($listMovies){
        $this->listMovies = $listMovies;
    }
}