<?php

$json = file_get_contents("routes.json");


$json_data = json_decode($json, true);



// no route found
if(empty($json_data['login'])){
    echo "yes";
}

