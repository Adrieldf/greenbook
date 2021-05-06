<?php

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Empresa;
use greenbook\repository\EmpresaRepository;

require_once __DIR__ . '/../../vendor/autoload.php';


$id = @$_POST["idEmpresa"];
$razao = @$_POST["txtRazao"];
$fantasia = @$_POST["txtFantasia"];
$email = @$_POST["txtEmail"];
$senha = @$_POST["txtSenha"];
$repitaSenha = @$_POST["txtRepitaSenha"];
$senhaAntiga = @$_POST["senhaAntiga"];

$factory = new EntityManagerFactory();
$repository = $factory->getEntityManager()->getRepository(Empresa::class);
$repository = repositoryClass($repository);

$empresa = $repository->findById($id);

$empresa->setRazaoSocial($razao);
$empresa->setNomeFantasia($fantasia);
$empresa->setEmail($email);
$empresa->setSenha(is_null($repitaSenha) || $repitaSenha == "" ? $senhaAntiga : $senha);


$result =  $repository->save($empresa); 

function repositoryClass($myClass): EmpresaRepository
{
    return $myClass;
}

header("Location: ../view/perfil-empresa.php?id=" . $id);
exit;

?>