<?php

namespace MVC\Controllers;
use MVC\View\View;

class Controller
{

    protected static $view;

    public function __construct()
    {
        self::$view = new View();
    }

    public static function createView()
    {
        echo 'view created';
    }
}