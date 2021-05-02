<?php

use greenbook\helper\EntityManagerFactory;
use greenbook\model\TipoDeTarefa;
use greenbook\repository\TipoDeTarefaRepository;

require_once __DIR__ . '/../../vendor/autoload.php';

$id = @$_POST["txtIdEdit"];
$tarefa = @$_POST["txtTarefaUpdate"];

$factory = new EntityManagerFactory();
$em = $factory->getEntityManager();

$tipoTarefaRepository = $em->getRepository(TipoDeTarefa::class);

$tipoTarefaRepository = tipoDeTarefaRepositoryClass($tipoTarefaRepository); 

$tipoTarefa = $tipoTarefaRepository->findById($id);

$tipoTarefa->setNome($tarefa);

$result =  $tipoTarefaRepository->save($tipoTarefa); 

function tipoDeTarefaRepositoryClass($myClass): TipoDeTarefaRepository
{
    return $myClass;
}

header("Location: ../view/cadastro-tipotarefa.php");
exit;

?>