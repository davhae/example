<?php
namespace davhae\example;

use Dotenv\Dotenv;
use Raven_Autoloader;
use Raven_Client;
use Raven_ErrorHandler;

use davhae\example\Utils\Router;

/**
 * Class Start
 *
 * Starts up the thing
 */
class Start
{
    /**
     * Start constructor.
     */
    public function __construct()
    {
        $this->dotenv = new Dotenv(__DIR__);
        $this->dotenv->load();

        // register sentry handlers
        Raven_Autoloader::register();
        $client = new Raven_Client(getenv('SENTRY_DSN'));
        $error_handler = new Raven_ErrorHandler($client);
        $error_handler->registerExceptionHandler();
        $error_handler->registerErrorHandler();
        $error_handler->registerShutdownFunction();

        // activate custom routes
        $router = new Router();
        $router->dispatchRoutes();

    }

    // sentry test
    public function doSomethingBad()
    {
        return 21 / 0;
    }
}

$start = new Start;
//$start->doSomethingBad();