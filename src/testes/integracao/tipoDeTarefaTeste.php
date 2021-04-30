<?php
namespace greenbook\testes\integracao;

use greenbook\helper\EntityManagerFactory;
use greenbook\model\TipoDeTarefa;
use greenbook\repository\TipoDeTarefaRepository;

require_once __DIR__ . '/../../../vendor/autoload.php';

$factory = new EntityManagerFactory();
$repository = $factory->getEntityManager()->getRepository(TipoDeTarefa::class);
$repository = repositoryClass($repository);

//____________________Teste de Insert:

$tDT = new TipoDeTarefa("nome");

$result =  $repository->save($tDT);

if($result->getId() > 0){
    echo "Teste de tipoDeTarefa insert = Sucesso";
} else
    echo "Teste de tipoDeTarefa insert = Falho";

echo "<br>";

//_________________________Teste de Find:

$id = $result->getId();

$tDT = $repository->findById($id);

if($tDT ->getId() == $id){
    echo "Teste de tipoDeTarefa findById = Sucesso";
} else
    echo "Teste de tipoDeTarefa findById = Falho";

echo "<br>";

//______________________Teste de Email:

$tDT->setNome("a");
$repository->save($tDT);

if($tDT ->getNome() == "a"){
    echo "Teste de tipoDeTarefa update = Sucesso";
} else
    echo "Teste de tipoDeTarefa update = Falho";

echo "<br>";

$tDT->setNome("a");
$repository->save($tDT);

//_____________________Fim dos testes

function repositoryClass($myClass): TipoDeTarefaRepository
{
    return $myClass;
}