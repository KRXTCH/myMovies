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

$p1 = new Playlist("coucou",1,array("111111","22222","33333"));
$p2 = new Playlist("ho",2,array("25","856","985"));
$p2->setAfficheUrl("https:/:/sjdofohsdfdshjf.com");

$user = new User("gille", "flo", "pipi@gmail.com", "sdqd");
$user2 = new User("", "", "pipi@gmail.com", "sdqd");
// $user->createUser($db);

$view = new ViewAllUser();
$id_user = $user2->userCheckDb($db);
$user = $view->getUser($id_user,$db);

// $user->createPlaylist($p1,$db);
// $user->createPlaylist($p2,$db);


// echo json_encode($user2->getListPlaylist());

$playlist = new Playlist('','');
print_r($user->getListPlaylist()[1]);
// $user->getListPlaylist()[1]->addMoviePlaylist('25541451', $db);
$user->getListPlaylist()[1]->deleteMoviePlaylist("25541451",$db);
// $ligne = $viewUser2->getUser(1, $db);
// print $ligne->mail;
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
// $dotenv->load();

// session_start();
// $router = new Router();

// $router->get('/', 'baseController', 'home');
