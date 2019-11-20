<?php

namespace MVC\Request;

class Request
{
//    public $url;
//
//    public function __construct()
//    {
//        $this->url = $_SERVER['REQUEST_URI'];
//    }

    public static function request()
    {
        return $_GET['url'];
    }
}
