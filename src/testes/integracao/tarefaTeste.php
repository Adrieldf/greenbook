<?php

namespace greenbook\testes\integracao;

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Tarefa;
use greenbook\model\TipoDeTarefa;
use greenbook\repository\TarefaRepository;
use greenbook\repository\TipoDeTarefaRepository;

require_once __DIR__ . '/../../../vendor/autoload.php';

$factory = new EntityManagerFactory();
$entityManager = $factory->getEntityManager();

$tRepository = $entityManager->getRepository(Tarefa::class);
$tipoRepository = $entityManager->getRepository(TipoDeTarefa::class);

$tRepository = repositoryClass($tRepository);
$tipoRepository = tipoRepositoryClass($tipoRepository);

//____________________Teste de Insert:

$tipoDeTarefa = $tipoRepository->findById(2);

$tarefa = new Tarefa("plantar 50 arvores", 500, 500, $tipoDeTarefa);

$result =  $tRepository->save($tarefa);

if($result->getId() > 0){
    echo "Teste de tarefa insert = Sucesso";
} else
    echo "Teste de tarefa insert = Falho";

echo "<br>";

//_________________________Teste de Find:

$id = $result->getId();

$tarefa = $tRepository->findById($id);

if($tarefa ->getId() == $id){
    echo "Teste de tarefa findById = Sucesso";
} else
    echo "Teste de tarefa findById = Falho";

echo "<br>";

//______________________Teste de Update:

$tarefa->setDescricao("d");
$tRepository->save($tarefa);

if($tarefa ->getDescricao() == "d"){
    echo "Teste de tarefa update = Sucesso";
} else
    echo "Teste de tarefa update = Falho";

echo "<br>";

$tarefa->setDescricao("plantar 50 arvores");
$tRepository->save($tarefa);

//_____________________Fim dos testes

function repositoryClass($myClass): TarefaRepository
{
    return $myClass;
}

function tipoRepositoryClass($myClass): TipoDeTarefaRepository
{
    return $myClass;
}

