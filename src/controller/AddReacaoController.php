<?php

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Publicacao;
use greenbook\model\Reacao;
use greenbook\model\Usuario;
use greenbook\repository\PublicacaoRepository;
use greenbook\repository\UsuarioRepository;

require_once __DIR__ . '/../../vendor/autoload.php';

session_start();
$publicacaoID = @$_GET["txtPublicacaoID"];
$usuarioID = @$_SESSION["id_usuario"];
$tipoDeReacao = @$_GET["txtTipoDeReacao"];

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$pRepository = $entityManager->getRepository(Publicacao::class);
$uRepository = $entityManager->getRepository(Usuario::class);

$pRepository = pRepositoryClass($pRepository);
$uRepository = uRepositoryClass($uRepository);

$publicacao = $pRepository->findById($publicacaoID);
$usuario = $uRepository->findById($usuarioID);
$reacao = new Reacao($tipoDeReacao, $usuario);

$publicacao->addReacao($reacao);
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
