<?php

namespace RLC\Framework\Http;

class Kernel
{
    public function handle(Request $request)
    {

        $content = include ROOT . "/src/views/home.php";
        return new \RLC\Framework\Http\Response($content, 200);
    }
}