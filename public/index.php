<?php


define("ROOT", dirname(__DIR__));
require_once dirname(__DIR__) . "/vendor/autoload.php";


$request = \RLC\Framework\Http\Request::getGlobals();

$router = new \RLC\Framework\Router\Router();

$kernel = new \RLC\Framework\Http\Kernel($router);

$response = $kernel->handle($request);

$response->send();
