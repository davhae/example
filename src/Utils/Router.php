<?php
namespace davhae\example\Utils;

use Klein\Klein;

/**
 * Class Router
 *
 * 'It should Route'
 */
class Router
{
    var $klein;

    public function __construct()
    {
        $this->klein = new Klein();
    }

    /**
     * get the routes accessible and connect them to the controller
     */
    public function dispatchRoutes()
    {
        $controller = new Controller();

        ### WEB ###
        // This is the main WEB route, others shouldn't be needed
        $this->klein->respond('GET', '/', function () use ($controller) {
            return $controller->index();
        });

        ### API ###
//        $klein->respond('GET', '/[:name]', function ($request) use ($controller) {
//            return $controller->main($request->name);
//        });

        $this->klein->dispatch();
    }
}