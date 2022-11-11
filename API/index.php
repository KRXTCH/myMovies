<?php

require_once 'vendor\autoload.php';
require_once 'src\controller\moviesController.php';
require_once 'src\controller\baseController.php';
require_once 'src\model\DatabaseConnector.php';
require_once 'src\model\User.php';
require_once 'src\model\Playlist.php';
require_once 'src\model\ViewAllPlaylist.php';
require_once 'src\model\ViewAllUser.php';

//Test Vincent
$db = new DatabaseConnector();
// $db->createTables();

$user = new User("jacck", "gilbert","coucou@gmail.com","hey");
$user_check = new User('','',"coucou@gmail.com","hey");
$id_user = $user_check->userCheckDb();

if($id_user != null)
{
    $view = new ViewAllUser();
    $user_get = $view->getUser($id_user);

    /////Création de playlist
    $playlist_ex1 = new Playlist("toto",1,array("333333","5555555","4578"));
    $playlist_ex1->setAfficheUrl("https://sfdqiuhjqsdhfuquisdyhf.com");
    $playlist_ex2 = new Playlist("tata",2,array("454","545","455454545"));
    $playlist_ex2->setAfficheUrl("https://fgdsfgdfgfdg.com");
    //////////

    $user_get->createPlaylist($playlist_ex1);
    $user_get->createPlaylist($playlist_ex2);

    $user_get->getListPlaylist()[1]->addMoviePlaylist("55554454");
    $user_get->getListPlaylist()[1]->deleteMoviePlaylist("545");


}
// $user->createUser();
////
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
