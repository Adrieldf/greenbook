<?php

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Recompensa;
use greenbook\repository\RecompensaRepository;

require_once __DIR__ . '/../../vendor/autoload.php';

$descricao = @$_POST["txtDescricao"];
$valor = @$_POST["txtValor"];

$factory = new EntityManagerFactory();
$em = $factory->getEntityManager();
$recompensaRepository = $em->getRepository(Recompensa::class);
$recompensaRepository = recompensaRepositoryClass($recompensaRepository); 

$recompensa = new Recompensa($descricao,$valor,false);

$result =  $recompensaRepository->save($recompensa); 

function recompensaRepositoryClass($myClass): RecompensaRepository
{
    return $myClass;
}

header("Location: ../view/cadastro-recompensas.php");
exit;

?>