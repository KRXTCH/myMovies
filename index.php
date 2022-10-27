<?php
//require "/inc/bootstrap.php";

require_once('src\controller\router\Router.php');;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$router = new Router($_GET['url']);
$router->get('/', function ($id) {
    //baseController
    echo "Bienvenue sur ma homepage !";
});
$router->get('/:id', function ($id) {
    echo "Voila l'article $id";
});
$router->run();
