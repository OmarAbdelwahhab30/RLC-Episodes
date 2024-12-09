<?php

namespace RLC\Framework\Http;

use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

class Kernel
{
    public function handle(Request $request)
    {

        // Loads the predefined routes.
        $dispatcher = simpleDispatcher(function (RouteCollector $r) {

            $routes = include ROOT."/routes/web.php";


            foreach ($routes as $route){

                $r->addRoute(...$route);
            }
        });


        // The package does the comparison and return the matching info.

        $matchingInfo = $dispatcher->dispatch($request->server['REQUEST_METHOD'],
            $request->server['REQUEST_URI']);


        [$status ,[$controller,$method], $vars] = $matchingInfo;

        // Call the handler.

        return call_user_func_array([new $controller,$method],$vars);


    }
}