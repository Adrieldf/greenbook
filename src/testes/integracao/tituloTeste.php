<?php

namespace greenbook\testes\integracao;

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Titulo;
use greenbook\repository\TituloRepository;

require_once __DIR__ . '/../../../vendor/autoload.php';

$factory = new EntityManagerFactory();
$repository = $factory->getEntityManager()->getRepository(Titulo::class);
$repository = repositoryClass($repository);

//____________________Teste de Insert:

$titulo = new Titulo("t", 500, true, "tt");

$result =  $repository->save($titulo);

if($result->getId() > 0){
    echo "Teste de titulo insert = Sucesso";
} else
    echo "Teste de titulo insert = Falho";

echo "<br>";

//_________________________Teste de Find:

$id = $result->getId();

$titulo = $repository->findById($id);

if($titulo ->getId() == $id){
    echo "Teste de titulo findById = Sucesso";
} else
    echo "Teste de titulo findById = Falho";

echo "<br>";

//______________________Teste de Update:

$titulo->setDescricao("d");
$repository->save($titulo);

if($titulo ->getDescricao() == "d"){
    echo "Teste de titulo update = Sucesso";
} else
    echo "Teste de titulo update = Falho";

echo "<br>";

$titulo->setDescricao("t");
$repository->save($titulo);

//_____________________Fim dos testes

function repositoryClass($myClass): TituloRepository
{
    return $myClass;
}
