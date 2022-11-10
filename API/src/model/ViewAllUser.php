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

    public function getUser($id_user, $db){

        try{ 
            
            $params = array(':id' => $id_user);

            ///Récupération des données d'un user
            $resultat = $db->getConnection()->prepare("SELECT * FROM user WHERE id_user = :id");
            
            $resultat->execute($params);

            $responseSql = $resultat->fetch(PDO::FETCH_OBJ);

            $user = new User($responseSql->nom,$responseSql->prenom,$responseSql->mail,$responseSql->password);

            $user->setIdUser($responseSql->id_user);

            return $user;

        }catch(PDOException $e){
            print "Erreur : ". $e->getMessage().'<br/>';
            die;
        }
    }
}