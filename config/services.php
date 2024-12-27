<?php


$container = new \League\Container\Container();

$container->delegate(new \League\Container\ReflectionContainer(true));

$container->add("DB",\RLC\Framework\dbal\DatabaseFactory::class);

$container->add(\Doctrine\DBAL\Connection::class,function () use ($container){
   return $container->get("DB")->getConnection();
});

$container->add(\RLC\Framework\Router\RouterInterface::class,
    \RLC\Framework\Router\Router::class);

$container->add(\RLC\Framework\Http\Kernel::class)
->addArgument(\RLC\Framework\Router\RouterInterface::class)
->addArgument($container);

return $container;