<?php

namespace RLC\Framework\Providers;

class DatabaseServiceProvider extends ServiceProvider
{


    public function register()
    {
        $this->container->add("DB",\RLC\Framework\dbal\DatabaseFactory::class);
    }

    public function boot()
    {
        $this->container->add(\Doctrine\DBAL\Connection::class,function (){
            return $this->container->get("DB")->getConnection();
        });
    }
}