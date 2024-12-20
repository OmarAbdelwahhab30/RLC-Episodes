<?php

namespace App\controller;

use RLC\Framework\Http\Response;

class HomeController
{

    public function __construct(PostsController $controller)
    {
    }

    public function index(){

        $content = "<h1> Hello World</h1>";

        return new Response($content,200);
    }
}