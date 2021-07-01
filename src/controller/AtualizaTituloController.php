<?php

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Titulo;
use greenbook\repository\TituloRepository;

require_once __DIR__ . '/../../vendor/autoload.php';

$descricao = @$_POST["txtDescricaoUpdate"];
$valor = @$_POST["txtValorUpdate"];
$nome = @$_POST["txtNomeUpdate"];
$id = @$_POST["txtIdEdit"];

$factory = new EntityManagerFactory();
$entityManager = $factory->getEntityManager();
$tituloRepository = $entityManager->getRepository(Titulo::class);
$tituloRepository = tituloRepositoryClass($tituloRepository);

$titulo = $tituloRepository->findById($id);

$titulo->setNome($nome);
$titulo->setDescricao($descricao);
$titulo->setValor($valor);

$reuslt = $tituloRepository->save($titulo);

function tituloRepositoryClass($myClass): TituloRepository
{
    return $myClass;
}

header("Location: ../view/cadastro-titulos.php");
exit;

?>