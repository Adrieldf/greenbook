<?php

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Empresa;
use greenbook\model\Publicacao;
use greenbook\repository\PublicacaoRepository;
use greenbook\model\Usuario;
use greenbook\repository\EmpresaRepository;
use greenbook\repository\UsuarioRepository;

require_once __DIR__ . '/../../vendor/autoload.php';

$idUsuario = @$_POST["idUsuario"];
$idEmpresa = @$_POST["idEmpresa"];
$titulo = @$_POST["txtTitulo"];
$descricao = @$_POST["txtDescricao"];
$imagem = @$_POST["imgFotoPost"];

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
$repository = $entityManager->getRepository(Publicacao::class);
$repository = repositoryClass($repository);

$publicacao = new Publicacao($titulo);
$publicacao->setDescricao($descricao);
$publicacao->setImagem($imagem);

if(!$idEmpresa == ""){
    $empresaRepository = $entityManager->getRepository(Empresa::class);
    $empresaRepository = empresaRepositoryClass($empresaRepository);
    $empresa = $empresaRepository->findById($idEmpresa);
    $publicacao->setEmpresa($empresa);
}else{
    $userRepository = $entityManager->getRepository(Usuario::class);
    $userRepository = usuarioRepositoryClass($userRepository);
    $usuario = $userRepository->findById($idUsuario);
    $publicacao->setUsuario($usuario);
}

try {
    echo $publicacao->getUsuario()->getNome();
    $repository->save($publicacao);
    
}catch (Exception $e){
   echo($e);

}

function repositoryClass($myClass): PublicacaoRepository
{
    return $myClass;
}
function usuarioRepositoryClass($myClass): UsuarioRepository
{
    return $myClass;
}
function empresaRepositoryClass($myClass): EmpresaRepository
{
    return $myClass;
}

header("Location: ../view/postagens.php");

exit;
