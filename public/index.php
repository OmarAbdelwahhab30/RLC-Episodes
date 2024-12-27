<?php


define("ROOT", dirname(__DIR__));
require_once dirname(__DIR__) . "/vendor/autoload.php";


$container = require ROOT."/config/services.php";
dd(($container->get(\Doctrine\DBAL\Connection::class))
->executeQuery("select * from users")->fetchAssociative());

$request = \RLC\Framework\Http\Request::getGlobals();

$kernel = $container->get(\RLC\Framework\Http\Kernel::class);

$response = $kernel->handle($request);

$response->send();
