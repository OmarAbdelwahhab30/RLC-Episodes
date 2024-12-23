<?php

namespace RLC\Framework\Router;

use League\Container\Container;
use RLC\Framework\Http\Request;

interface RouterInterface
{

    public function dispatch(Request $request,Container $container);
}