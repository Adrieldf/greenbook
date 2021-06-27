<?php

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Publicacao;
use greenbook\repository\PublicacaoRepository;

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
$publicacao->setUsuario($idUsuario);
$publicacao->setEmpresa($idEmpresa);
$publicacao->setDescricao($descricao);
$publicacao->setImagem($imagem);
echo "<script> alert('foi'); </script>";
try {
    $repository->save($publicacao);
    
}catch (Exception $e){
   echo($e);

}

function repositoryClass($myClass): PublicacaoRepository
{
    return $myClass;
}

header("Location: ../view/postagens.php");

exit;
?>