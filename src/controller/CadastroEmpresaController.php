<?php

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Empresa;
use greenbook\repository\EmpresaRepository;

require_once __DIR__ . '/../../vendor/autoload.php';

$razao = @$_GET["txtRazao"];
$fantasia = @$_GET["txtFantasia"];
$email = @$_GET["txtEmail"];
$senha = @$_GET["txtSenha"];
$repitaSenha = @$_GET["txtRepitaSenha"];

$factory = new EntityManagerFactory();
$repository = $factory->getEntityManager()->getRepository(Empresa::class);
$repository = repositoryClass($repository);

$empresa = new Empresa($email,$senha,$razao);
$empresa->setNomeFantasia($fantasia);

try {
    $repository->save($empresa);
    
}catch (Exception $e){
   echo($e);

}

function repositoryClass($myClass): EmpresaRepository
{
    return $myClass;
}

header("Location: ../view/login.php");

exit;
?>