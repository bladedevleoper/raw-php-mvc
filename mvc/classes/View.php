<?php

namespace MVC\View;

class View
{

    public static function view()
    {

    }


    protected function getHeader()
    {
        return require_once('views/header.php');
    }



}