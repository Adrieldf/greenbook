<?php

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Titulo;
use greenbook\repository\TituloRepository;

require_once __DIR__ . '/../../vendor/autoload.php';

$id = key($_POST['clicked']);

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
$repository = $entityManager->getRepository(Titulo::class);
$repository = repositoryClass($repository);

$result =  $repository->delete($id); 

function repositoryClass($myClass): TituloRepository
{
    return $myClass;
}

header("Location: ../view/cadastro-titulos.php");
exit;

?>