<?php

require_once 'vendor\autoload.php';
require_once 'src\controller\router.php';
require_once ("src\model\DatabaseConnector.php");
require_once ("src\model\User.php");
require_once ("src\model\ViewAllUser.php");
require_once ("src\model\ViewAllPlaylist.php");

$db =  new DatabaseConnector();
//$db->createTables();

$user = new User("gille", "flo", "pipi@gmail.com", "sdqd");
//$user->createUser($db);

$viewUser = new ViewAllUser();
$viewUser2 = new ViewAllUser();
$tableau = $viewUser->getAllUser($db);

foreach($tableau as $user1){
    print "ligne : $user1->prenom<br/>";
}


$ligne = $viewUser2->getUser(1, $db);
print $ligne->mail;
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
// $dotenv->load();

// session_start();
// $router = new Router();

// $router->get('/', 'baseController', 'home');
