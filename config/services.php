<?php


$container = new \League\Container\Container();

$container->delegate(new \League\Container\ReflectionContainer(true));

$container->add(\RLC\Framework\Router\RouterInterface::class,
    \RLC\Framework\Router\Router::class);

$container->add(\RLC\Framework\Http\Kernel::class)
->addArgument(\RLC\Framework\Router\RouterInterface::class)
->addArgument($container);

return $container;