<?php

require_once 'vendor\autoload.php';
require_once 'src\controller\router.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

session_start();
$router = new Router();

$router->get('/', 'baseController', 'home');
