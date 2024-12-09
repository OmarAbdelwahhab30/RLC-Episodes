<?php

namespace App\controller;

use RLC\Framework\Http\Response;

class PostsController
{


    public function show($id,$int){
        $content = "<h1> The post has id number : $id with integer $int</h1>";

        return new Response($content,200);
    }
}