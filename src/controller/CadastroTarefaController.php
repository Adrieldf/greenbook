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

$nomeTipoDeTarefa = @$_POST["txtTipoTarefa"]; //adicionei essa variavel, ainda tem que fazer ela vir da view

$factory = new EntityManagerFactory();
$em = $factory->getEntityManager();

$tarefaRepository = $em->getRepository(Tarefa::class); //pegando os repositorios
$tipoTarefaRepository = $em->getRepository(TipoDeTarefa::class); //pegando os repositorios

$tarefaRepository = tarefaRepositoryClass($tarefaRepository); //fazendo o cast
$tipoTarefaRepository = tipoDeTarefaRepositoryClass($tipoTarefaRepository); //fazendo o cast

$tipoTarefa  = $tipoTarefaRepository->findByNome($nomeTipoDeTarefa); //pega um tipoTarefa do banco,  no caso o 2 porque o $idTipoDeTarefa ainda nao ta sendo prenchido

$tarefa = new Tarefa($descTarefa,$pontos,$moedas, $tipoTarefa); //cria a tarefa
$result =  $tarefaRepository->save($tarefa); //salva no bd

function tarefaRepositoryClass($myClass): TarefaRepository //so troquei o nome pra min não me confundir
{
    return $myClass;
}

function tipoDeTarefaRepositoryClass($myClass): TipoDeTarefaRepository //adicionei essa funcao
{
    return $myClass;
}


header("Location: ../view/cadastro-tarefas.php");
exit;

?>
