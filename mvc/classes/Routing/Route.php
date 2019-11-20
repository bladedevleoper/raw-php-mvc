<?php

namespace MVC\Classes\Routing;
//use MVC\Controllers;
use MVC\Request\Request;
use Exception;

class Route
{

    //public static $validRoutes = [];
    public $validRoutes = [];
    private static $controller;
    private static $method;
    private static $namespace = "\\MVC\\Controllers\\";
    public $requestObj;


    //use this to push to an array
//    public static function set($route, $function)
//    {
//        //check if array key exists from url
//        self::$validRoutes[$route] = $function;
//
//        //need to put this code somewhere else
//        if ($_GET['url'] == $route) {
//
//            if (is_callable($function)) {
//                $function->__invoke();
//            }
//
//            //come up with better naming convention and try to look at Single Responsibility
//            if (gettype($function) == 'string') {
//
//                $split = self::splitFunction($function);
//
//                self::$controller = $split[0];
//                self::$method = $split[1];
//
//                self::doesClassExist();
//                self::doesMethodExistsInClass(self::$controller);
//
//            }
//        }
//
//    }


    public function set($route, $function)
    {
        $this->validRoutes[$route] = $function;

        var_dump($this->validRoutes);
    }


    public static function splitFunction($function)
    {
        return explode('@', $function);
    }

    private static function callMethod()
    {

    }

    //TODO need to re-engineer this
    //checks if class exists
    private static function doesClassExist()
    {
        try {
            if (!class_exists(self::bindClassAndNamespace())) {
                throw new Exception('Sorry there seems to be an error');
            }

        } catch (Exception $e) {

            echo 'error: ' .  $e->getMessage();
        }

        $controller = self::bindClassAndNamespace();
        self::$controller = new $controller();

        return true;
    }



    private static function doesMethodExistsInClass($controller)
    {
        try {

            if (method_exists($controller, self::$method)) {
                $method = self::$method;
                return $controller::$method();
            }

            throw new Exception('404 Not Found');

        } catch (Exception $e) {
            echo 'Error ' . $e->getMessage();
        }

    }

    private static function bindClassAndNamespace()
    {
        return self::$namespace.self::$controller;
    }



}