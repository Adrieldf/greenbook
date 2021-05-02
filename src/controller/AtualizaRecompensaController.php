<?php

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Recompensa;
use greenbook\repository\RecompensaRepository;

require_once __DIR__ . '/../../vendor/autoload.php';

$descricao = @$_POST["txtDescricaoUpdate"];
$valor = @$_POST["txtValorUpdate"];
$id = @$_POST["txtIdEdit"];

$factory = new EntityManagerFactory();
$em = $factory->getEntityManager();
$recompensaRepository = $em->getRepository(Recompensa::class);
$recompensaRepository = recompensaRepositoryClass($recompensaRepository);

$recompensa = $recompensaRepository->findById($id);

$recompensa->setDescricao($descricao);
$recompensa->setValor($valor);

$result =  $recompensaRepository->save($recompensa); 

function recompensaRepositoryClass($myClass): RecompensaRepository
{
    return $myClass;
}

header("Location: ../view/cadastro-recompensas.php");
exit;

?>