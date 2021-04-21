
<?php

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Empresa;
use greenbook\model\Usuario;

require_once __DIR__ . '/../../vendor/autoload.php';

// Inicia sessão 
session_start();
// Recupera o login 
$login = isset($_POST["txtEmail"]) ? addslashes(trim($_POST["txtEmail"])) : FALSE;
// Recupera a senha, a criptografando em MD5 
$senha = isset($_POST["txtSenha"]) ? md5(trim($_POST["txtSenha"])) : FALSE;
//$senha = isset($_POST["senha"]) ? trim($_POST["senha"]) : FALSE; 

// Usuário não forneceu a senha ou o login 
if (!$login || !$senha) {
    echo "Você deve digitar sua senha e login!<br>";
    echo "<a href='../view/login.php'>Efetuar Login</a>";
    exit;
}



$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
$objectRepository = $entityManager->getRepository(Usuario::class);

//$usuario = new Usuario();

//$usuario = $usuario->fromCadastro("leonard", "a@a.com", "aaa");

//$criteria = new \Doctrine\Common\Collections\Criteria();
//$criteria->where($criteria->expr()->gt('email', $login));
//$objectRepository->save($usuario);
$usuario = $objectRepository->findOneBy(array('email' => $login));


//$dao = $factory->getUsuarioDao();
//$usuario = $dao->buscaPorLogin($login);

$problemas = FALSE;
if ($usuario) {
    // Agora verifica a senha 
    if (strcmp($senha, $usuario->getSenha())) {
        // TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário 
        $_SESSION["id_usuario"] = $usuario->getId();
        $_SESSION["nome_usuario"] = stripslashes($usuario->getNome());
        //$_SESSION["permissao"]= $dados["postar"]; 
        echo "<script> console.log('Login feito com sucesso! Usuario: ' " .  $_SESSION['nome_usuario'] . " </script>";
        header("Location: ../view/perfil-usuario.php");
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
