<?php

namespace MVC\Controllers;
use MVC\View\View;

class Controller
{

    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function createView()
    {
        echo 'view created';
    }
}