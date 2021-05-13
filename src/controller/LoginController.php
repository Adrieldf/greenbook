
<?php

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Usuario;
use greenbook\repository\UsuarioRepository;
use greenbook\model\Empresa;
use greenbook\repository\EmpresaRepository;

require_once __DIR__ . '/../../vendor/autoload.php';

session_start();
$login = isset($_POST["txtEmail"]) ? addslashes(trim($_POST["txtEmail"])) : FALSE;
$senha = isset($_POST["txtSenha"]) ? md5(trim($_POST["txtSenha"])) : FALSE;

if (!$login || !$senha) {
    echo "Você deve digitar sua senha e login!<br>";
    echo "<a href='../view/login.php'>Efetuar Login</a>";
    exit;
}

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
$objectRepository = $entityManager->getRepository(Usuario::class);
$objectRepository = usuarioRepositoryClass($objectRepository);
$usuario = $objectRepository->findOneBy(array('email' => $login));

$problemas = FALSE;
if ($usuario) {
    if (strcmp($senha, $usuario->getSenha())) {
        preencheSessoes($usuario->getId(), $usuario->getNome(), false, $usuario->isAdmin());

        echo "<script> console.log('Login feito com sucesso! Usuario: ' " .  $_SESSION['nome_usuario'] . " </script>";
        header("Location: ../view/perfil-usuario.php?id=" . $usuario->getId());
        exit;
    } else {
        $problemas = TRUE;
    }
} else {
    $repository = $entityManager->getRepository(Empresa::class);
    $repository = empresaRepositoryClass($repository);
    $empresa = $repository->findOneBy(array('email' => $login));
    if($empresa){
        if (strcmp($senha, $empresa->getSenha())) {
            preencheSessoes($empresa->getId(),$empresa->getNomeFantasia(), true, false);
            header("Location: ../view/perfil-empresa.php?id=" . $empresa->getId());
            exit;
        }
    }


    $problemas = TRUE;
}

if ($problemas == TRUE) {
    //echo "Problema ao fazer login, tente de novo!";
    // echo "<script> console.log('Problema ao fazer login!') </script>";
    header("Location: ../view/login.php");
    exit;
}

function preencheSessoes($id, $nome, $empresa, $admin){
    $_SESSION["id_usuario"] = $id;
    $_SESSION["nome_usuario"] = stripslashes($nome);
    $_SESSION["empresa"] = $empresa;
    $_SESSION["admin"] = $admin;
}
function usuarioRepositoryClass($myClass): UsuarioRepository
{
    return $myClass;
}
function empresaRepositoryClass($myClass): EmpresaRepository
{
    return $myClass;
}
?>
