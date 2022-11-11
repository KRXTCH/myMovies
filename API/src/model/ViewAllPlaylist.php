<?php

class ViewAllPlaylist
{
    public function getAllPlaylist(){

        global $db;
        try{   
            $resultat = $db->getConnection()->prepare("SELECT * FROM playlist");
            
            $resultat->execute();

            return $resultat->fetchAll(PDO::FETCH_OBJ); 

        }catch(PDOException $e){
            print "Erreur : ". $e->getMessage().'<br/>';
            die;
        }
    }

    public function getUserAllPlaylist($id_user){

        global $db;
        $tablePlaylist = array();
        try{ 
            
            $params = array(':id_user' => $id_user);

            $resultat = $db->getConnection()->prepare("SELECT * FROM playlist WHERE id_user = :id_user");
            
            $resultat->execute($params);

            $responseSqlTablePlaylist = $resultat->fetchAll(PDO::FETCH_OBJ);

            foreach($responseSqlTablePlaylist as $rowPlaylist)
            {
                $playlist = new Playlist($rowPlaylist->titre, $rowPlaylist->genre, json_decode($rowPlaylist->listemovies));
                $playlist->setIdPlaylist($rowPlaylist->id_playlist);
                $playlist->setAfficheUrl($rowPlaylist->affiche_url);
                array_push($tablePlaylist, $playlist);
            }

            return $tablePlaylist;

        }catch(PDOException $e){
            print "Erreur : ". $e->getMessage().'<br/>';
            die;
        }
    }
}