<?php


class Manager
{
    static public $db;

    static function connectDB($data)
    {
        self::$db = mysqli_connect($data['host'], $data['username'], $data['password'], $data['dbname']);

        return self::$db;
    }
}



