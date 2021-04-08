<?php

use greenbook\helper\EntityManagerFactory;

require_once __DIR__ . '/vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
//$entityManager->getRepository(Empresa::class);

var_dump($entityManager->getConnection());