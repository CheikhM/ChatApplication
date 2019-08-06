<?php
/*
 * Simple routing system by Cheikh El Moctar .htaccess file
 */

define("DIRECTORY_PATH", str_replace("\\", '/',__DIR__ ));

require_once DIRECTORY_PATH . '/../core/classes/Controller.php';
require_once  DIRECTORY_PATH . '/../core/classes/Request.php';
require_once DIRECTORY_PATH . '/../src/Controllers/DefaultController.php';

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
$controller->{$route_info['action']}();


?>