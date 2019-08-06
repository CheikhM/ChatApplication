<?php
/*
 * Simple routing system by Cheikh El Moctar .htaccess file
 */
session_start();
error_reporting(0);
ini_set('display_errors', 0);

define("DIRECTORY_PATH", str_replace("\\", '/',__DIR__ ));

require_once DIRECTORY_PATH . '/../core/classes/Controller.php';
require_once  DIRECTORY_PATH . '/../core/classes/Request.php';
require_once DIRECTORY_PATH . '/../src/Controllers/DefaultController.php';
require_once DIRECTORY_PATH . '/../src/Controllers/AuthController.php';
require_once DIRECTORY_PATH . '/../src/Controllers/RESTController.php';
require_once DIRECTORY_PATH . '/../core/classes/Manager.php';
require_once 'connexion.php';
require_once DIRECTORY_PATH . '/../src/Model/UserManager.php';
require_once DIRECTORY_PATH . '/../src/Model/MessageManager.php';


$request = new Request();

#parse the routes files
$json = file_get_contents("routes.json");
$routes_list = json_decode($json, true);

#check if route exist
function routeExists($request, $routes){

    $bool = array_key_exists($request->getRoute(), $routes);
    if($bool){

        return true;
    }

    return false;
}

#find route
function findController($name){

}

if(!routeExists($request, $routes_list)){
    die(DefaultController::NotFound());

}

$route_info = $routes_list[$request->getRoute()];
$controller = new $route_info['controller']();

if($route_info['with_data'] == "true") {
    $controller->{$route_info['action']}($request);
}
else {
    $controller->{$route_info['action']}();

}

?>
