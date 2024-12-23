<?php

namespace RLC\Framework\Router;

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use League\Container\Container;
use RLC\Framework\Http\Request;
use function FastRoute\simpleDispatcher;

class Router implements RouterInterface
{


    /**
     * @throws \Exception
     */
    public function dispatch(Request $request,Container $container)
    {
        // Loads the predefined routes.
        $dispatcher = simpleDispatcher(function (RouteCollector $r) {

            $routes = include ROOT . "/routes/web.php";


            foreach ($routes as $route) {

                $r->addRoute(...$route);
            }
        });


        // The package does the comparison and return the matching info.

        $matchingInfo = $dispatcher->dispatch(
            $request->server['REQUEST_METHOD'],
            $request->server['REQUEST_URI']
        );

        switch ($matchingInfo[0]) {
            case Dispatcher::FOUND:
                return $this->returnRoutes($matchingInfo[1], $matchingInfo[2],$container);

            case Dispatcher::METHOD_NOT_ALLOWED:
                throw new \Exception("The allowed method is " . $matchingInfo[1][0]);

            default:
                throw new \Exception("route is not found");
        }

    }

    private function returnRoutes(array $handler, array $arguments,$container)
    {

        $controllerObj = $container->get($handler[0]);

        return call_user_func_array([$controllerObj,$handler[1]],$arguments);
    }
}