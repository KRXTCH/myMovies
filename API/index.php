<?php

require_once 'vendor\autoload.php';
require_once 'src\controller\userController.php';
require_once 'src\controller\baseController.php';
require_once 'src\controller\playlistController.php';


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$request_url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
$request_url = rtrim($request_url, '/');
$request_url = strtok($request_url, '?');


$route_parts = explode('/', $request_url);
array_shift($route_parts);
$baseController = new baseController();
$userController = new userController();
$playlistController = new playlistController();
if (count($route_parts) == 3) {
    switch ($route_parts[2]) {
        case 'user':
            if (count($route_parts) == 4) {
            } else {
            }
            echo $route_parts[2];
            break;
        case 'playlist':
            echo $route_parts[2];
            break;

        default:
            $baseController->Error();
            break;
    }
} else {
    $baseController->Home();
}
