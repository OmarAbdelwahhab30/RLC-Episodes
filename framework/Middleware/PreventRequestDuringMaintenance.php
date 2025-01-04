<?php

namespace RLC\Framework\Middleware;

use RLC\Framework\Http\Request;

class PreventRequestDuringMaintenance
{


    public function handle(Request $request){

        if ($_ENV['MAINTENANCE_MODE'] == 'true'){
            echo "Try again later!";
            exit();
        }
    }
}