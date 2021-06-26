<?php

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Usuario;
use greenbook\repository\UsuarioRepository;

require_once __DIR__ . '/../../vendor/autoload.php';


$id = @$_POST["idUsuario"];
$nome = @$_POST["txtNome"];
$email = @$_POST["txtEmail"];
$senha = @$_POST["txtSenha"];
$descricao = @$_POST["txtDescricao"];
$cep = @$_POST["txtCep"];
$rua = @$_POST["txtRua"];
$numero = @$_POST["txtNumero"];
$complemento = @$_POST["txtComplemento"];
$bairro = @$_POST["txtBairro"];
$cidade = @$_POST["txtCidade"];
$pais = @$_POST["txtPais"];
$estado = @$_POST["cboEstado"];
$senhaAntiga = @$_POST["senhaAntiga"];
$repitaSenha = @$_POST["txtRepitaSenha"];

$factory = new EntityManagerFactory();
$repository = $factory->getEntityManager()->getRepository(Usuario::class);
$repository = repositoryClass($repository);

$usuario = $repository->findById($id);

$usuario->setNome($nome);
$usuario->setEmail($email);
$usuario->setSenha(is_null($repitaSenha) || $repitaSenha == "" ? $senhaAntiga : $senha);
$usuario->setDescricao($descricao);
$usuario->setCep($cep);
$usuario->setRua($rua);
$usuario->setNumero($numero);
$usuario->setComplemento($complemento);
$usuario->setBairro($bairro);
$usuario->setCidade($cidade);
$usuario->setPais($pais);
$usuario->setEstado($estado);

$result =  $repository->save($usuario);

function repositoryClass($myClass): UsuarioRepository
{
    return $myClass;
}

header("Location: ../view/perfil-usuario.php?id=" . $id);
exit;

?>