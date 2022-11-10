<?php

require_once 'vendor\autoload.php';
require_once 'src\controller\router.php';
require_once ("src\model\DatabaseConnector.php");
require_once ("src\model\User.php");
require_once ("src\model\Playlist.php");
require_once ("src\model\ViewAllUser.php");
require_once ("src\model\ViewAllPlaylist.php");

$db =  new DatabaseConnector();
// $db->createTables();

$user = new User("gille", "flo", "pipi@gmail.com", "sdqd");
$user2 = new User("gille", "flo", "pipi@gmail.com", "sdqd");
// $user->createUser($db);

$view = new ViewAllUser();
$id_user = $user2->userCheckDb($db);
$user2 = $view->getUser($id_user,$db);

// $p1 = new Playlist("coucou","horreur",array("111111","22222","33333"));
// $p2 = new Playlist("ho","fantaisie",array("25","856","985"));



// echo json_encode($user2->getListPlaylist());
$playlist = new Playlist('','');
$playlist = $user2->getListPlaylist()[1];
$playlist->addMoviePlaylist("2225152",$db);
// $user2->createPlaylist($p1,$db);
// $user2->createPlaylist($p2,$db);
// $ligne = $viewUser2->getUser(1, $db);
// print $ligne->mail;
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
// $dotenv->load();

// session_start();
// $router = new Router();

// $router->get('/', 'baseController', 'home');
