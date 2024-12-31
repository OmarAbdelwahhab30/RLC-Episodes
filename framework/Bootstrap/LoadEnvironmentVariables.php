<?php

namespace RLC\Framework\Bootstrap;

class LoadEnvironmentVariables
{


    public function bootstrap($container = null){

        $dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__,2));
        $dotenv->load();
    }
}