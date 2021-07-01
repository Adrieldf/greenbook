<?php

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Titulo;
use greenbook\model\Usuario;
use greenbook\repository\TituloRepository;
use greenbook\repository\UsuarioRepository;

require_once __DIR__ . '/../../vendor/autoload.php';

$idTitulo = @$_POST["idTitulo"];
$idUsuario = @$_POST["idUsuario"];

$factory = new EntityManagerFactory();
$entityManager = $factory->getEntityManager();
$tituloRepository = $entityManager->getRepository(Titulo::class);
$tituloRepository = tituloRepositoryClass($tituloRepository);
$titulo = $tituloRepository->findById(intval($idTitulo));

$usuarioRepository = $entityManager->getRepository(Usuario::class);
$usuarioRepository = usuarioRepositoryClass($usuarioRepository);
$usuario = $usuarioRepository->findById(intval($idUsuario));

$usuario->setMoedas($usuario->getMoedas()-$titulo->getValor());
$usuario->addTitulo($titulo);
//$usuario->setMoedas(600);
$result =  $usuarioRepository->save($usuario);

return;

function tituloRepositoryClass($myClass): TituloRepository
{
    return $myClass;
}

function usuarioRepositoryClass($myClass): UsuarioRepository
{
    return $myClass;
}

?>