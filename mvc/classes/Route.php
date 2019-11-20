<?php

namespace MVC\Classes\Routing;
//use MVC\Controllers;

use Exception;

class Route
{

    public static $validRoutes = [];
    private static $controller;
    private static $method;
    private static $namespace = "\\MVC\\Controllers\\";
    public static $currentObj;

    public static function set($route, $function)
    {
        self::$validRoutes[] = $route;

        if ($_GET['url'] == $route) {

            if (is_callable($function)) {
                $function->__invoke();
            }

            //come up with better naming convention and try to look at Single Responsibility
            if (gettype($function) == 'string') {

                $split = self::splitFunction($function);

                self::$controller = $split[0];
                self::$method = $split[1];

                self::doesClassExist();
                self::doesMethodExistsInClass(self::$controller);

            }
        }

    }

    public static function splitFunction($function)
    {
        return explode('@', $function);
    }

    private static function callMethod()
    {

    }


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