<?php

require_once 'vendor\autoload.php';
require_once 'src\controller\moviesController.php';
require_once 'src\controller\baseController.php';
require_once 'src\controller\userController.php';
require_once 'src\model\seeder.php';
require_once 'src\model\database.php';
require_once 'src\model\user.php';
require_once 'src\model\databaseConnector.php';


header("Access-Control-Allow-Origin: *");

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

//echo $_SERVER['REQUEST_METHOD'];

$createDatabase = new Database();
$createDatabase->createDatabase();

$db = new DatabaseConnector();
// Voir ou on met les seaders
// $seeder = new Seeder();
// $seeder->seedUser();
// $seeder->seedPlaylist();


$request_url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
$request_url = rtrim($request_url, '/');
$request_url = strtok($request_url, '?');

$baseController = new baseController();
$moviesController = new moviesController();
$userController = new userController();

$route_parts = explode('/', $request_url);
$routes = array_slice($route_parts, 3);




if (count($routes) > 0) {
    switch ($routes[0]) {
        case 'movies':
            if ($routes[1] > 1) {
                switch ($routes[1]) {
                    case 'search':
                        if (count($routes) > 2) {
                            $moviesController->search($routes[2]);
                        } else {
                            $baseController->Error();
                        }
                        break;
                    case 'popular':
                        $moviesController->popular();
                        break;
                    default:
                        $baseController->Error();
                        break;
                }
            } else {
                $baseController->Error();
            }
            break;
        case 'movie':
            $moviesController->detail($routes[1]);
            break;
        case 'user':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $userController->create($_POST);
            } else {
                $baseController->Error();
            }
            break;
        default:
            $baseController->Error();
            break;
    }
} else {
    $baseController->Error();
}
