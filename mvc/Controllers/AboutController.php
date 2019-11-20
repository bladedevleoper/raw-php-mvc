<?php

namespace MVC\Controllers;

//use MVC\Controllers;

class AboutController extends Controller
{

    public static function createView()
    {

        return self::$view->view();


    }

}