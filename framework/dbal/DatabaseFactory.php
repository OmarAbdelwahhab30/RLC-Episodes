<?php

namespace RLC\Framework\dbal;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;

class DatabaseFactory
{

    public Connection $connection;

    public function __construct()
    {
        $connectionParams = [
            'dbname' => 'framework',
            'user' => 'root',
            'password' => '',
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
        ];
        $this->connection = DriverManager::getConnection($connectionParams);
    }

    public function getConnection()
    {
        return $this->connection;
    }
}