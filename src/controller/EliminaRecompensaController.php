<?php

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Recompensa;
use greenbook\repository\RecompensaRepository;

require_once __DIR__ . '/../../vendor/autoload.php';

$id = key($_POST['clicked']);

$factory = new EntityManagerFactory();
$em = $factory->getEntityManager();
$recompensaRepository = $em->getRepository(Recompensa::class);
$recompensaRepository = recompensaRepositoryClass($recompensaRepository); 

$result =  $recompensaRepository->delete($id); 

function recompensaRepositoryClass($myClass): RecompensaRepository
{
    return $myClass;
}

header("Location: ../view/cadastro-recompensas.php");
exit;

?>