<?php

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Titulo;
use greenbook\repository\TituloRepository;

require_once __DIR__ . '/../../vendor/autoload.php';

$descricao = @$_GET["txtDescricao"];
$valor = @$_GET["txtValor"];
$diponivelParaCompra = @$_GET["txtDiponivelParaCompra"];
$nome = @$_GET["txtNome"];

$titulo = new Titulo($descricao, $valor, $diponivelParaCompra, $nome);

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
$repository = $entityManager->getRepository(Titulo::class);
$repository = repositoryClass($repository);

$result = $repository->save($titulo);

function repositoryClass($myClass): TituloRepository
{
    return $myClass;
}

//header();

exit;
