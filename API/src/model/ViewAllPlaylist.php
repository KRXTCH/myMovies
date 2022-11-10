<?php

class ViewAllPlaylist
{
    public function getAllPlaylist($db){

        try{   
            $resultat = $db->getConnection()->prepare("SELECT * FROM playlist");
            
            $resultat->execute();

            return $resultat->fetchAll(PDO::FETCH_OBJ); 

        }catch(PDOException $e){
            print "Erreur : ". $e->getMessage().'<br/>';
            die;
        }
    }

    public function getUserAllPlaylist($id_user, $db){
        $tablePlaylist = array();
        try{ 
            
            $params = array(':id_user' => $id_user);

            $resultat = $db->getConnection()->prepare("SELECT id_playlist, titre, genre FROM playlist WHERE id_user = :id_user");
            
            $resultat->execute($params);

            $responseSqlTablePlaylist = $resultat->fetchAll(PDO::FETCH_OBJ);

            foreach($responseSqlTablePlaylist as $rowPlaylist)
            {
                $tableMovie = array();
                $playlist = new Playlist($rowPlaylist->titre, $rowPlaylist->genre);
                $playlist->setIdPlaylist($rowPlaylist->id_playlist);

                $resultat = $db->getConnection()->prepare("SELECT id_movie, id_film FROM movie WHERE id_playlist = :id_playlist");
            
                $resultat->execute(array(':id_playlist' => $playlist->getIdPlaylist()));

                $responseSqlTableMovie = $resultat->fetchAll(PDO::FETCH_OBJ);

                foreach($responseSqlTableMovie as $rowMovie)
                {
                    $movie = new Movie($rowMovie->id_film);
                    $movie->setIdMovie($rowMovie->id_movie);
                    array_push($tableMovie, $movie);
                }

                $playlist->setListMovies($tableMovie);
                array_push($tablePlaylist, $playlist);
            }

            return $tablePlaylist;

        }catch(PDOException $e){
            print "Erreur : ". $e->getMessage().'<br/>';
            die;
        }
    }
}