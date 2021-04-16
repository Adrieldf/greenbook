<?php

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Usuario;
use greenbook\repository\UsuarioRepository;

require_once __DIR__ . '/../../vendor/autoload.php';

$name = @$_GET["txtNomeCompleto"];
$email = @$_GET["txtEmail"];
$password = @$_GET["txtSenha"];
$repeatPassword = @$_GET["txtRepitaSenha"];

$entityManagerFactory = new EntityManagerFactory();

$entityManager = $entityManagerFactory->getEntityManager();

$repository = $entityManager->getRepository(Usuario::class);

error_log($entityManager);
$usuario = new Usuario();
$usuario = $usuario->fromCadastro($name, $email, $password);

try {
    //$this->repositoryClass($repo)->save($usuario);
    $repository->save($usuario);
    
}catch (Exception $e){
   echo($e);

}

function repositoryClass($myClass): UsuarioRepository
{
    return $myClass;
}

header("Location: ../view/login.php");

exit;
?>