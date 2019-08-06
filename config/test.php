<?php
error_reporting(E_ERROR | E_PARSE);

// Read the routes file
$json = file_get_contents("routes.json");
// Decode JSON
$json_data = json_decode($json, true);



// no route found
if(empty($json_data['login'])){
    echo "yes";
}


