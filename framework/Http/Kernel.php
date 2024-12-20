<?php

namespace RLC\Framework\Http;

use League\Container\Container;
use RLC\Framework\Router\RouterInterface;
class Kernel
{
    private RouterInterface $router;

    private Container $container;
    public function __construct(RouterInterface $router,Container $container)
    {
        $this->router = $router;
        $this->container = $container;
    }

    public function handle(Request $request)
    {
        [$handler , $arguments] = $this->router->dispatch($request);

        $controllerObj = $this->container->get($handler[0]);
        return call_user_func_array([$controllerObj,$handler[1]],$arguments);
    }
}