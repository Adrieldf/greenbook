
<?php

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Empresa;
use greenbook\model\Usuario;

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
$usuario = $objectRepository->findOneBy(array('email' => $login));

$problemas = FALSE;
if ($usuario) {
    if (strcmp($senha, $usuario->getSenha())) {
        $_SESSION["id_usuario"] = $usuario->getId();
        $_SESSION["nome_usuario"] = stripslashes($usuario->getNome());
        //$_SESSION["permissao"]= $dados["postar"]; 
        echo "<script> console.log('Login feito com sucesso! Usuario: ' " .  $_SESSION['nome_usuario'] . " </script>";
        header("Location: ../view/perfil-usuario.php?id=" . $usuario->getId());
        exit;
    } else {
        $problemas = TRUE;
    }
} else {
    $problemas = TRUE;
}

if ($problemas == TRUE) {
    echo "Problema ao fazer login, tente de novo!";
    echo "<script> console.log('Problema ao fazer login! Usuario: ' " .  $_SESSION['nome_usuario'] . " </script>";
    header("Location: ../view/login.php");
    exit;
}
?>
