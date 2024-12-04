<?php


define("ROOT", dirname(__DIR__));
require_once dirname(__DIR__) . "/vendor/autoload.php";


$request = \RLC\Framework\Http\Request::getGlobals();


$content = include ROOT."/src/views/home.php";
$response = new \RLC\Framework\Http\Response($content, 200);


$response->send();
