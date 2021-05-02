<?php

use greenbook\helper\EntityManagerFactory;
use greenbook\model\TipoDeTarefa;
use greenbook\model\Tarefa;
use greenbook\repository\TipoDeTarefaRepository;
use greenbook\repository\TarefaRepository;

require_once __DIR__ . '/../../vendor/autoload.php';

$id = @$_POST["txtIdEdit"];
$descricao = @$_POST["txtTarefaUpdate"];
$nomeTipoTarefa = @$_POST["txtTipoTarefaUpdate"];
$pontos = @$_POST["txtPontosUpdate"];
$moedas = @$_POST["txtMoedasUpdate"];

$factory = new EntityManagerFactory();
$em = $factory->getEntityManager();

$tarefaRepository = $em->getRepository(Tarefa::class);     
$tipoTarefaRepository = $em->getRepository(TipoDeTarefa::class);

$tarefaRepository = tarefaRepositoryClass($tarefaRepository); 
$tipoTarefaRepository = tipoDeTarefaRepositoryClass($tipoTarefaRepository); 

$tarefa = $tarefaRepository->findById($id);
$tipoTarefa = $tipoTarefaRepository->findByNome($nomeTipoTarefa);

$tarefa->setDescricao($descricao);
$tarefa->setValorEmMoedas($moedas);
$tarefa->setValorEmPontos($pontos);
$tarefa->setTipoDeTarefa($tipoTarefa);

$result =  $tarefaRepository->save($tarefa); 

function tarefaRepositoryClass($myClass): TarefaRepository
{
    return $myClass;
}
function tipoDeTarefaRepositoryClass($myClass): TipoDeTarefaRepository
{
    return $myClass;
}

header("Location: ../view/cadastro-tarefas.php");
exit;

?>