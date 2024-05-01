<?php



session_start();
const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . "Core/functions.php";

require base_path('vendor/autoload.php');
require base_path('bootstrap.php');


$router = new \Core\Router();
$routes = require base_path("routes.php");

//routeToController($uri, $routes);
$method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];
$uri = (parse_url($_SERVER['REQUEST_URI']))["path"];

$router->route($uri, $method);




