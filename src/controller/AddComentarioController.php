<?php

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Comentario;
use greenbook\model\Publicacao;
use greenbook\model\Usuario;
use greenbook\repository\PublicacaoRepository;
use greenbook\repository\UsuarioRepository;

require_once __DIR__ . '/../../vendor/autoload.php';

session_start();
$publicacaoID = @$_GET["txtPublicacaoID"];
$usuarioID = @$_SESSION["id_usuario"];
$comentario = @$_GET["txtComentario"];

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$pRepository = $entityManager->getRepository(Publicacao::class);
$uRepository = $entityManager->getRepository(Usuario::class);

$pRepository = pRepositoryClass($pRepository);
$uRepository = uRepositoryClass($uRepository);

$publicacao = $pRepository->findById($publicacaoID);
$usuario = $uRepository->findById($usuarioID);
$comentario = new Comentario($comentario, $usuario, $publicacao);

$publicacao->addComentario($comentario);
$result = $pRepository->save($publicacao);

function pRepositoryClass($myClass): PublicacaoRepository
{
    return $myClass;
}

function uRepositoryClass($myClass): UsuarioRepository
{
    return $myClass;
}

//header();

exit;
