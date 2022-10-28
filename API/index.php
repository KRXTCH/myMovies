<?php

require_once 'vendor\autoload.php';
require_once 'src\controller\router.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

session_start();
$router = new Router();

$router->get('/', 'baseController', 'home');
$router->get('/user', 'userController', 'show');
$router->get('/users', 'userController', 'shows');
$router->get('/', 'baseController', 'home');
$router->get('/', 'baseController', 'home');
