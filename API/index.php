<?php

require_once 'vendor\autoload.php';
require_once 'src\controller\moviesController.php';
require_once 'src\controller\baseController.php';


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$request_url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
$request_url = rtrim($request_url, '/');
$request_url = strtok($request_url, '?');

$baseController = new baseController();
$moviesController = new moviesController();

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
                    case 'detail':
                        if (count($routes) > 2) {
                            $moviesController->detail($routes[2]);
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
            break;

        default:
            $baseController->Error();
            break;
    }
} else {
    $baseController->Error();
}


// if (count($route_parts) > 3) {
//     switch ($route_parts[2]) {
//         case 'movies':
//             if (count($route_parts) > 2) {
//                 switch ($route_parts[3]) {
//                     case 'search':
//                         if (count($route_parts) > 3) {
//                             $moviesController->search($route_parts[4]);
//                         } else {
//                             $baseController->Error();
//                         }
//                         break;

//                     default:
//                         # code...
//                         break;
//                 }
//             } else {
//                 $baseController->Error();
//             }
//             break;
//         default:
//             $baseController->Error();
//             break;
//     }
// } else {
//     $baseController->Home();
// }
