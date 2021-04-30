<?php

namespace greenbook\testes\integracao;

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Publicacao;
use greenbook\repository\PublicacaoRepository;

require_once __DIR__ . '/../../../vendor/autoload.php';

$factory = new EntityManagerFactory();
$repository = $factory->getEntityManager()->getRepository(Publicacao::class);
$repository = repositoryClass($repository);

//____________________Teste de Insert:

$publicacao = new Publicacao("texto");

$result =  $repository->save($publicacao);

if($result->getId() > 0){
    echo "Teste de publicacao insert = Sucesso";
} else
    echo "Teste de publicacao insert = Falho";

echo "<br>";

//_________________________Teste de Find:

$id = $result->getId();

$publicacao = $repository->findById($id);

if($publicacao ->getId() == $id){
    echo "Teste de publicacao findById = Sucesso";
} else
    echo "Teste de publicacao findById = Falho";

echo "<br>";

//______________________Teste de Email:

$publicacao->setTexto("teste@teste.com");
$repository->save($publicacao);

if($publicacao ->getTexto() == "teste@teste.com"){
    echo "Teste de publicacao update = Sucesso";
} else
    echo "Teste de publicacao update = Falho";

echo "<br>";

$publicacao->setTexto("texto");
$repository->save($publicacao);

//_____________________Fim dos testes

function repositoryClass($myClass): PublicacaoRepository
{
    return $myClass;
}