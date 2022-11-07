<?php

class ViewAllUser
{
    public function getAllUser($db){

        try{   
            $resultat = $db->getConnection()->prepare("SELECT * FROM user");
            
            $resultat->execute();

            return $resultat->fetchAll(PDO::FETCH_OBJ); 

        }catch(PDOException $e){
            print "Erreur : ". $e->getMessage().'<br/>';
            die;
        }
    }

    public function getUser($id, $db){

        try{ 
            
            $params = array(':id' => $id);

            $resultat = $db->getConnection()->prepare("SELECT * FROM user WHERE id_user = :id");
            
            $resultat->execute($params);

            return $resultat->fetch(PDO::FETCH_OBJ);

        }catch(PDOException $e){
            print "Erreur : ". $e->getMessage().'<br/>';
            die;
        }
    }
}