<?php

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Empresa;
use greenbook\model\Usuario;

require_once __DIR__ . '/vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
$objectRepository = $entityManager->getRepository(Usuario::class);

$usuario = new Usuario();

$usuario = $usuario->fromCadastro("leonard", "a@a.com", "aaa");

$objectRepository->save($usuario);

var_dump($entityManager->getConnection());