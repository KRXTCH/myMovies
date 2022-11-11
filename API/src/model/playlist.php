<?php

class Playlist
{
    private $name;
    private $cover_url;
    private $list_movies;
    private $is_private;
    private $id_user;



    public function __construct($name, $cover_url, $id_user, $is_private)
    {
        $this->name = $name;
        $this->cover_url = $cover_url;
        $this->id_user = $id_user;
        $this->is_private = $is_private;
    }

    public function createPlaylist()
    {
        global $db;
        try {

            $pdo = $db->getConnection();

            $sql = "INSERT INTO playlist (
                `name`,
                `cover_url`,
                `id_user`,
                `is_private`
            )
            VALUES (?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                $this->name,
                $this->cover_url,
                $this->id_user,
                $this->is_private,
            ]);
            $this->getPlaylist($pdo->lastInsertId());
        } catch (PDOException $e) {
            print "Erreur : " . $e->getMessage() . '<br/>';
            die;
        }
    }
    public function getPlaylist($id)
    {
        global $db;
        try {
            $pdo = $db->getConnection();
            $sql = "SELECT
                *
            FROM playlist WHERE `id_playlist`= ? ";
            $stmt = $pdo->prepare($sql);

            $stmt->execute([
                $id
            ]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            echo json_encode($row);
        } catch (PDOException $e) {
            print "Erreur : " . $e->getMessage() . '<br/>';
            die;
        }
    }

    public function updatePlaylist()
    {
        // refaire lupadte pour quil soit formaliser comme dans
        global $db;
        try {
            $params = array(':titre' => $this->titre, ':genre' => $this->genre, ':id_playlist' => $this->id_playlist, ':liste' => json_encode($this->listMovies), ':url' => $this->afficheUrl);

            $resultat = $db->getConnection()->prepare("UPDATE playlist SET titre = :titre, genre = :genre, affiche_url = :url, listemovies = :liste WHERE id_playlist = :id_playlist");

            $resultat->execute($params);

            print "Modification du user: [$this->id_playlist] <br/>";
        } catch (PDOException $e) {
            print "Erreur : " . $e->getMessage() . '<br/>';
            die;
        }
    }

    public function addMoviePlaylist($id_film)
    {
        // pas ouf ca, faut recuper id playlist et id film puis update

        try {
            array_push($this->listMovies, $id_film);
            $this->updatePlaylist();
            print "Ajout movie: [$id_film] <br/>";
        } catch (PDOException $e) {
            print "Erreur : " . $e->getMessage() . '<br/>';
            die;
        }
    }
}
