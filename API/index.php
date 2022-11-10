<?php

require_once 'vendor\autoload.php';
require_once 'src\controller\router.php';
require_once ("src\model\DatabaseConnector.php");
require_once ("src\model\User.php");
require_once ("src\model\Playlist.php");
require_once ("src\model\Movie.php");
require_once ("src\model\ViewAllUser.php");
require_once ("src\model\ViewAllPlaylist.php");

$db =  new DatabaseConnector();
// $db->createTables();

$user = new User("gille", "flo", "pipi@gmail.com", "sdqd");
$user->setIdUser(2);
$m1 = new Movie(64544564);
$m2 = new Movie(65456);
$m3 = new Movie(35456);
// $p1 = new Playlist("hey","fantaisie");
// $p2 = new Playlist("ho","imaginaire", array($m2));
$p3 = new Playlist("ho","imaginaire",array($m1, $m2, $m3));

$p3->setIdPlaylist(10);

$viewPlaylist = new ViewAllPlaylist();
$table = $viewPlaylist->getUserAllPlaylist($user->getIdUser(),$db);
foreach($table as $row)
{
    print_r($row->getListMovies());
}
// $user->createPlaylist($p3,$db);
// $user2 = new User("gilbert", "flo", "pipi@gmail.com", "sdqd");
// $user->createUser($db);

// $user->setIdUser(1);

// $playlist = new Playlist("caca", "horreur");
// $playlist->createPlaylist($user->getIdUser(),$db);


// $viewUser = new ViewAllUser();
// $user = $viewUser->getUser(1, $db);
// echo $user->getNom();
// $user->setNom("philipe");
// $user->updateUser($db);
// $user = $viewUser->getUser(1, $db);
// echo $user->getNom();
// $viewUser2 = new ViewAllUser();
// $tableau = $viewUser->getAllUser($db);

// $tableauUser = array($user, $user2);
// foreach($tableauUser as $user)
// {
//     echo $user->getNom();
// }
// foreach($tableau as $user1){
//     print "ligne : $user1->prenom<br/>";
// }


// $ligne = $viewUser2->getUser(1, $db);
// print $ligne->mail;
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
// $dotenv->load();

// session_start();
// $router = new Router();

// $router->get('/', 'baseController', 'home');
