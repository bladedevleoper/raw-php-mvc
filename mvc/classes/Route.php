<?php

namespace MVC\Classes\Routing;
//use MVC\Controllers;

class Route
{

    public static $validRoutes = [];
    private static $controller;
    private static $method;
    public static $namespace = "\\MVC\\Controllers\\";
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


                $space = self::$namespace.$split[0];
                $method = $split[1];
                $controller = new $space();

                if (method_exists($controller, $method)) {
                    $controller::$method();
                }
            }
        }

    }

    public static function splitFunction($function)
    {
        return explode('@', $function);
    }

}