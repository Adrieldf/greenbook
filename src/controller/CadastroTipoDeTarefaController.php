<?php

use greenbook\helper\EntityManagerFactory;
use greenbook\model\TipoDeTarefa;
use greenbook\repository\TipoDeTarefaRepository;

require_once __DIR__ . '/../../vendor/autoload.php';

$tarefa = @$_POST["txtTarefa"];

$factory = new EntityManagerFactory();
$em = $factory->getEntityManager();

$tipoTarefaRepository = $em->getRepository(TipoDeTarefa::class);

$tipoTarefaRepository = tipoDeTarefaRepositoryClass($tipoTarefaRepository); 

$tipoTarefa = new TipoDeTarefa($tarefa);

$result =  $tipoTarefaRepository->save($tipoTarefa); 

function tipoDeTarefaRepositoryClass($myClass): TipoDeTarefaRepository
{
    return $myClass;
}

header("Location: ../view/cadastro-tipotarefa.php");
exit;

?>