<?php


define("ROOT", dirname(__DIR__));
require_once dirname(__DIR__) . "/vendor/autoload.php";


$request = \RLC\Framework\Http\Request::getGlobals();



$kernel = new \RLC\Framework\Http\Kernel();
$response = $kernel->handle($request);

$response->send();
