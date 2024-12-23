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
        return $this->router->dispatch($request,$this->container);
    }
}