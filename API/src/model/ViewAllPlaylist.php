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

    public function getPlaylist($id, $db){

        try{ 
            
            $params = array(':id' => $id);

            $resultat = $db->getConnection()->prepare("SELECT * FROM playlist WHERE id_playlist = :id");
            
            $resultat->execute($params);

            return $resultat->fetchAll(PDO::FETCH_OBJ);

        }catch(PDOException $e){
            print "Erreur : ". $e->getMessage().'<br/>';
            die;
        }
    }
}