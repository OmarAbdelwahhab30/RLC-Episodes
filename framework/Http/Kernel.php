<?php

namespace RLC\Framework\Http;

use RLC\Framework\Router\RouterInterface;
class Kernel
{
    private RouterInterface $router;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    public function handle(Request $request)
    {
        [$handler , $arguments] = $this->router->dispatch($request);

        return call_user_func_array([new $handler[0],$handler[1]],$arguments);
    }
}