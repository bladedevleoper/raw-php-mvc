<?php

namespace MVC\View;

class View
{

    public static function view($content = null, array $attributes = [])
    {
        if (!is_null($attributes)) {
            extract($attributes);
        }

        //header
        self::getHeader();

        if (!is_null($content)) {
            self::getContent($content);
        }

        self::getFooter();
    }


    private static function getHeader()
    {
        return require_once('../views/header.php');
    }

    private static function getFooter()
    {
        return require_once('../views/footer.php');
    }

    private static function getContent($content)
    {
        return require_once('../views/'.$content.'.php');
    }


}