<?php

require("../vendor/autoload.php");


// here make all calls and use routes.

use Router\RouterHandler;

$slug = $_GET["slug"] ?? "";
$slug = explode("/", $slug);

$resource = $slug[0] == "" ? "/" : $slug[0];
$id = $slug[1] ?? null;

//Make instance router:
$router = new RouterHandler();

switch ($router) {
    case "/":
        echo "This is Front Page.";
        break;

    case "dashboard":
        echo "This is Dashboard.";
        break;
    
    default:
        echo "Página no encontrada.";
        break;
}