<?php

define("ROOT", dirname(__DIR__));
require_once dirname(__DIR__) . "/vendor/autoload.php";


$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();



$container = require ROOT."/config/services.php";

$request = \RLC\Framework\Http\Request::getGlobals();

$kernel = $container->get(\RLC\Framework\Http\Kernel::class);

$response = $kernel->handle($request);

$response->send();
