<?php

require("../vendor/autoload.php");


// here make all calls and use routes.

use App\Controllers\UsersController;
use Router\RouteHandler;

$slug = $_GET["slug"] ?? "";
$slug = explode("/", $slug);

$resource = $slug[0] == "" ? "/" : $slug[0];
$id = $slug[1] ?? null;

//Make instance router:
$router = new RouteHandler();

switch ($resource) {
    case '/':
        require("../resources/views/index.php");
        break;

    case 'dashboard':
        $method = $_POST["method"] ?? "get";
        $router->set_method($method);
        $router->set_data($_POST);
        $router->route(UsersController::class, $id);
        break;
    
    default:
        echo "Página no encontrada.";
        break;
}