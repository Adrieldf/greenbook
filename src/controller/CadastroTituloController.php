<?php

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Titulo;
use greenbook\repository\TituloRepository;

require_once __DIR__ . '/../../vendor/autoload.php';

$descricao = @$_POST["txtDescricao"];
$valor = @$_POST["txtValor"];
//$diponivelParaCompra = @$_GET["txtDiponivelParaCompra"];
$nome = @$_POST["txtNome"];

$titulo = new Titulo($descricao, $valor, false, $nome);

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
$repository = $entityManager->getRepository(Titulo::class);
$repository = repositoryClass($repository);

$result = $repository->save($titulo);

function repositoryClass($myClass): TituloRepository
{
    return $myClass;
}

header("Location: ../view/cadastro-titulos.php");
exit;

?>
