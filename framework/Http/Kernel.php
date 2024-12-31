<?php

namespace RLC\Framework\Http;

use League\Container\Container;
use RLC\Framework\Bootstrap\BootProviders;
use RLC\Framework\Bootstrap\LoadEnvironmentVariables;
use RLC\Framework\Bootstrap\RegisterProviders;
use RLC\Framework\Router\RouterInterface;
class Kernel
{

    protected array $bootstrappers =
        [
            LoadEnvironmentVariables::class,
            RegisterProviders::class,
            BootProviders::class
        ];
    private RouterInterface $router;

    private Container $container;
    public function __construct(RouterInterface $router,Container $container)
    {
        $this->router = $router;
        $this->container = $container;
    }

    public function handle(Request $request)
    {


        $this->bootstrapApplication();
        return $this->router->dispatch($request,$this->container);
    }

    private function bootstrapApplication()
    {

        foreach ($this->bootstrappers as $bootstrapper){
            (new $bootstrapper)->bootstrap($this->container);
        }
    }
}
