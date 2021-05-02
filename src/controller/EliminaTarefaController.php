<?php

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Tarefa;
use greenbook\repository\TarefaRepository;

require_once __DIR__ . '/../../vendor/autoload.php';

$id = key($_POST['clicked']);

$factory = new EntityManagerFactory();
$em = $factory->getEntityManager();

$tarefaRepository = $em->getRepository(Tarefa::class);

$tarefaRepository = tarefaRepositoryClass($tarefaRepository); 

$result =  $tarefaRepository->delete($id); 

function tarefaRepositoryClass($myClass): TarefaRepository
{
    return $myClass;
}

header("Location: ../view/cadastro-tarefas.php");
exit;

?>