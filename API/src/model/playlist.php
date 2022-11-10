<?php

class Playlist
{

    private $id_playlist;
    private $titre;
    private $genre;
    private $listMovies;
    

  
    public function __construct($titre, $genre, $listMovies = null)
    {
        $this->id_playlist = null;
        $this->titre = $titre;
        $this->genre = $genre;
        $this->listMovies = $listMovies;
    }

    public function updatePlaylist($db){

        try{
            $params = array(':titre' => $this->titre, ':genre' => $this->genre,':idPlaylist' => $this->id_playlist,);
     
            $resultat = $db->getConnection()->prepare("UPDATE playlist SET titre = :titre, genre = :genre WHERE id_playlist = :idPlaylist");
            
            $resultat->execute($params);

            print "Modification du user: [$this->id_playlist] <br/>";

        }catch(PDOException $e){
            print "Erreur : ". $e->getMessage().'<br/>';
            die;
        }
    }

    public function addMoviePlaylist ($movie, $db)
    {
        try{
            $params = array(':id_playlist' => $this->id_playlist, ':id_film' => $movie->getIdFilm());
    
            $resultat = $db->getConnection()->prepare("INSERT INTO movie (id_playlist, id_film) VALUES (:id_playlist,:id_film)");
                
            $resultat->execute($params);

            print "Création de la playlist: [$this->titre, $this->genre] <br/>";

            array_push($this->listMovie, $movie);

        }catch(PDOException $e){
            print "Erreur : ". $e->getMessage().'<br/>';
            die;
        }  
    }

    public function deleteMoviePlaylist ($movie, $db)
    {
        try{
            $params = array(':id_playlist' => $this->id_playlist, ':id_film' => $movie->getIdFilm());
    
            $resultat = $db->getConnection()->prepare("DELETE FROM movie WHERE id_playlist = :id_playlist and id_film = :id_film");
                
            $resultat->execute($params);

            print "Suppresion movie: [$movie->getIdFilm())] <br/>";

            array_push($this->listMovie, $movie);

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

            $resultatTableMovie = $db->getConnection()->prepare("DELETE FROM movie WHERE id_playlist = :id_playlist");

            $resultatTableMovie->execute($params);

            print "Suppression des movie relier à la playlist: [$this->id_playlist] <br/>";

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