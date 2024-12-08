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

            $r->addRoute("GET", "/", function () {
                $content = include ROOT . "/src/views/home.php";
                return new \RLC\Framework\Http\Response($content, 200);
            });

            $r->addRoute("GET","/post/{id:\d+}",function ($postID){

                $postPage = "This post has id number : ".$postID['id'];
                return new \RLC\Framework\Http\Response($postPage, 200);
            });
        });


        // The package does the comparison and return the matching info.

        $matchingInfo = $dispatcher->dispatch($request->server['REQUEST_METHOD'],
            $request->server['REQUEST_URI']);


        [$status , $handler, $vars] = $matchingInfo;

        // Call the handler.
        return $handler($vars);
    }
}