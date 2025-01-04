<?php

namespace RLC\Framework\Middleware;

use RLC\Framework\Http\Request;

class EnsureJsonContent
{


    public function handle(Request $request){
        if ($request->server['REQUEST_METHOD'] == "POST"){
            if (!str_contains($request->server['HTTP_ACCEPT'],"application/json")){
                echo "unsupported media type !";
                exit();
            }
        }
    }
}