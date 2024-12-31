<?php

define("ROOT", dirname(__DIR__));
require_once ROOT . "/vendor/autoload.php";

$container = require ROOT."/config/services.php";

$request = \RLC\Framework\Http\Request::getGlobals();

$kernel = $container->get(\RLC\Framework\Http\Kernel::class);

$response = $kernel->handle($request);

$response->send();
