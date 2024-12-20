<?php


$container = new \League\Container\Container();


$container->add(\RLC\Framework\Router\RouterInterface::class,
    \RLC\Framework\Router\Router::class);

$container->add(\RLC\Framework\Http\Kernel::class)
->addArgument(\RLC\Framework\Router\RouterInterface::class);

return $container;