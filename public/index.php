<?php

require_once dirname(__DIR__) . "/vendor/autoload.php";


$request = \RLC\Framework\Http\Request::getGlobals();

dd($request);

echo "Hello world";