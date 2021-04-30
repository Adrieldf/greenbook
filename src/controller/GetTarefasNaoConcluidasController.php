<?php

use greenbook\helper\EntityManagerFactory;
use greenbook\model\TarefaUsuario;
use greenbook\model\Usuario;
use greenbook\repository\TarefaUsuarioRepository;
use greenbook\repository\UsuarioRepository;

require_once __DIR__ . '/../../vendor/autoload.php';

session_start();
$usuarioID = @$_SESSION["id_usuario"];

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$tuRepository = $entityManager->getRepository(TarefaUsuario::class);
$uRepository = $entityManager->getRepository(Usuario::class);

$tuRepository = tuRepositoryClass($tuRepository);
$uRepository = uRepositoryClass($uRepository);

$usuario = $uRepository->findById($usuarioID);
$array = $tuRepository->findAllByConcluidaAndUsuario(false, $usuario);

function tuRepositoryClass($myClass): TarefaUsuarioRepository
{
    return $myClass;
}

function uRepositoryClass($myClass): UsuarioRepository
{
    return $myClass;
}

//header();

exit;