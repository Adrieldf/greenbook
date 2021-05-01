<?php

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Tarefa;
use greenbook\model\TipoDeTarefa;
use greenbook\repository\TarefaRepository;
use greenbook\repository\TipoDeTarefaRepository;

require_once __DIR__ . '/../../vendor/autoload.php';

$descTarefa = @$_POST["txtTarefa"];
$moedas = @$_POST["txtMoedas"];
$pontos = @$_POST["txtPontos"];

$factory = new EntityManagerFactory();
$repository = $factory->getEntityManager()->getRepository(Tarefa::class);
$repository = repositoryClass($repository);

$tipoTarefa = new TipoDeTarefa("nome");
$tarefa = new Tarefa($descTarefa,$pontos,$moedas,$tipoTarefa);

$result =  $repository->save($tarefa);

function repositoryClass($myClass): TarefaRepository
{
    return $myClass;
}

?>