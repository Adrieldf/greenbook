<?php

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Usuario;
use greenbook\repository\UsuarioRepository;

require_once __DIR__ . '/../../vendor/autoload.php';


$id = @$_POST["idUsuario"];
$fotoPerfil = @$_POST["fotoPerfil"];
$nomeFotoPerfil = @$_POST["nomeFotoPerfil"];

$factory = new EntityManagerFactory();
$repository = $factory->getEntityManager()->getRepository(Usuario::class);
$repository = repositoryClass($repository);

$usuario = $repository->findById($id);
$usuario->setFotoPerfil($fotoPerfil);


$result =  $repository->save($usuario);

function repositoryClass($myClass): UsuarioRepository
{
    return $myClass;
}

echo "../view/perfil-usuario.php?id=" . $id;

//header("Location: ../view/perfil-usuario.php?id=" . $id);
exit;

?>