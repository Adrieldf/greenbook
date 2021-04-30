<?php

namespace greenbook\testes\integracao;

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Usuario;
use greenbook\repository\UsuarioRepository;

require_once __DIR__ . '/../../../vendor/autoload.php';

$factory = new EntityManagerFactory();
$repository = $factory->getEntityManager()->getRepository(Usuario::class);
$repository = repositoryClass($repository);

//____________________Teste de Insert:

$usuario = new Usuario();
$usuario = $usuario->fromCadastro("nome", "a@a.com", "123");

$result =  $repository->save($usuario);

if($result->getId() > 0){
    echo "Teste de usuario insert = Sucesso";
} else
    echo "Teste de usuario insert = Falho";

echo "<br>";

//_________________________Teste de Find:

$id = $result->getId();

$usuario = $repository->findById($id);

if($usuario ->getId() == $id){
    echo "Teste de usuario findById = Sucesso";
} else
    echo "Teste de usuario findById = Falho";

echo "<br>";

//______________________Teste de Email:

$usuario->setEmail("teste@teste.com");
$repository->save($usuario);

if($usuario ->getEmail() == "teste@teste.com"){
    echo "Teste de usuario update = Sucesso";
} else
    echo "Teste de usuario update = Falho";

echo "<br>";

$usuario->setEmail("a@a.com");
$repository->save($usuario);

//_____________________Fim dos testes

function repositoryClass($myClass): UsuarioRepository
{
    return $myClass;
}

