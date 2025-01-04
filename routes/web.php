<?php


use App\controller\HomeController;
use App\controller\PostsController;
use RLC\Framework\Middleware\EnsureJsonContent;

return [
    ["GET","/",[HomeController::class,"index"]  ],
    ["GET","/post/{id:\d+}/{int:\d+}",[PostsController::class,"show"]],
    ["GET","/view",[HomeController::class,"viewPage"]],
    ['POST',"/addUser",
        [HomeController::class,"addUser", [EnsureJsonContent::class] ]
    ],
];