<?php
namespace davhae\example\Utils;


/**
 * Class Router
 *
 * 'It should Route'
 */
class Router
{

    public static function dispatchRoutes()
    {
        $klein = new \Klein\Klein();
        $klein->respond('GET', '/', function () {
            return 'Hello World!';
        });

        $klein->dispatch();
    }
}