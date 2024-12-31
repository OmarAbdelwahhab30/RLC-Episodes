<?php

namespace RLC\Framework\Providers;

use League\Container\Container;

abstract class ServiceProvider
{


    protected Container $container;
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function register(){

    }

    public function boot(){

    }
}