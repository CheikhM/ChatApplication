<?php
/**
 * Created by PhpStorm.
 * User: inejih
 * Date: 06/08/2019
 * Time: 01:26
 */

class Request {

    public $url;
    public $method;
    public $data;

    function __construct()
    {
        $this->url  =  $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->data = $_REQUEST;
    }


    function getRoute()
    {
        $route = explode('/ChatApplication/', $this->url);

        return $route[1];
    }


}