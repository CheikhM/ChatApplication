<?php
require_once './core/classes/Manager.php';
require_once './config/connexion.php';

Manager::connectDB($data);

$curent = 1;
$user = 2;

$sql = "SELECT * FROM message WHERE (from_id='$curent' OR from_id='$user') AND (to_id='$user' OR to_id='$curent') ";

$query = mysqli_query(Manager::$db, $sql);

echo "<pre>";
while ($row = mysqli_fetch_assoc($query)){

    print_r($row);
}
