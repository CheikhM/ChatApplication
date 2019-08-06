<?php

require_once 'config/connexion.php';
require_once 'core/classes/Manager.php';
require_once 'src/Model/UserManager.php';


$manager = new UserManager();

Manager::connectDB($data);

$user_data = ['username' => 'Osman', 'email' => 'email@gamil.com', 'password' => md5('12345')];

$result = $manager->addUser($user_data);

var_dump($result);
