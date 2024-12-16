<?php

namespace RLC\Framework\Router;

use RLC\Framework\Http\Request;

interface RouterInterface
{

    public function dispatch(Request $request);
}