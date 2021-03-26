<?php

namespace greenbook\helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{
    public function getEntityManager():  EntityManagerInterface
    {
        $rootDir = __DIR__ . '/../..';
        $config = Setup::createAnnotationMetadataConfiguration(
            [$rootDir . '/src'],
            true
        );
        $connection = [
            'driver' => 'pdo_mysql',
            'dbname' => 'greenbook',
            'user' => 'root',
            'password' => '',
            'host' => 'localhost:3307',
        ];

//        $connection = [
//            'driver' => 'pdo_pgsql',
//            'dbname' => 'erp',
//            'user' => 'postgres',
//            'password' => 'root',
//            'host' => 'localhost:5432',
//        ];
        return EntityManager::create($connection, $config);
    }
}