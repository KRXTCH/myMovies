<?php


// refaire la class car cest nimporte quoi avec le construct
class User
{

    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $is_admin;
    private $list_playlist;

    public function __construct(
        $firstname,
        $lastname,
        $email,
        $password,
        $is_admin = 0,
        $list_playlist = null
    ) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->is_admin = $is_admin;
        $this->list_playlist = $list_playlist;
    }

    public function createUser()
    {
        global $db;
        try {

            $pdo = $db->getConnection();

            $sql = "INSERT INTO user (
                `firstname`,
                `lastname`,
                `email`,
                `password`,
                `is_admin`,
                `list_playlist`
            )
            VALUES (?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $pwd_hash = password_hash($this->password, PASSWORD_DEFAULT);
            $stmt->execute([
                $this->firstname,
                $this->lastname,
                $this->email,
                $pwd_hash,
                $this->is_admin,
                $this->list_playlist
            ]);
            $this->getUser($pdo->lastInsertId());
        } catch (PDOException $e) {
            print "Erreur : " . $e->getMessage() . '<br/>';
            die;
        }
    }

    public function getUser($id)
    {
        global $db;
        try {

            $pdo = $db->getConnection();

            $sql = "SELECT
                id_user,
                firstname,
                lastname,
                email,
                is_admin,
                list_playlist
            FROM user WHERE `id_user`= ? LIMIT 1 ";
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
    public function getUsers()
    {
        global $db;
        try {

            $pdo = $db->getConnection();

            $sql = "SELECT
                id_user,
                firstname,
                lastname,
                email,
                is_admin,
                list_playlist
            FROM user  ";
            $stmt = $pdo->prepare($sql);

            $stmt->execute([]);
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($row);
        } catch (PDOException $e) {
            print "Erreur : " . $e->getMessage() . '<br/>';
            die;
        }
    }
}
