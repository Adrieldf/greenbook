<?php

namespace greenbook\view;

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Usuario;
use greenbook\repository\UsuarioRepository;

require_once __DIR__ . '\..\controller\MainController.php';
require_once __DIR__ . '\..\..\vendor\autoload.php';
require_once("header.php");
?>
<!DOCTYPE html>
<html>

<?php
include("header.php");
include("navbar.php");
?>

<?php
$idUsuario = @$_GET["id"];
$id = "";
$nome = "";
$email = "";
$senha = "";
$telefone = "";
$cep = "";
$rua = "";
$numero = "";
$complemento = "";
$bairro = "";
$cidade = "";
$estado = "";

if (!is_null($idUsuario)) {

    $factory = new EntityManagerFactory();
    $repository = $factory->getEntityManager()->getRepository(Usuario::class);
    $repository = repositoryClass($repository);
    $usuario = $repository->findById($idUsuario);

    if (!is_null($usuario) && $usuario->getId() == $idUsuario) {
       $nome = $usuario->getNome();

    }
    /* $pgDaoFactory = new PgDaoFactory();
    $dao = $pgDaoFactory->getClienteDao();
    $cliente = $dao->getOneById($idCliente);
    if (is_null($cliente)) {
        echo "<script type='javascript'>alert('Erro ao carregar dados do cliente!');";
        header("Location: ../view/index.php");
        exit;
    }

    $id = $cliente->getId();
    $nome = $cliente->getNome();
    $email = $cliente->getEmail();
    $senha = $cliente->getSenha();
    $telefone = $cliente->getTelefone();
    $cep = $cliente->getEndereco()->getCep();
    $rua = $cliente->getEndereco()->getRua();
    $numero = $cliente->getEndereco()->getNumero();
    $complemento = $cliente->getEndereco()->getComplemento();
    $bairro = $cliente->getEndereco()->getBairro();
    $cidade = $cliente->getEndereco()->getCidade();
    $estado = $cliente->getEndereco()->getEstado();*/
}
?>

<body>
    <div class="container-fluid p-3 my-3 border">
        <h3>Perfil</h3>
        <div class="container-fluid border">
            <div class="row">
                <h4>Dados</h4>
                <div class="col-md-4">
                    <img class="perfil-usuario-imagem" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRh3sMJVjn4X-HocVUO5GcSBbpctWhzhpCU4Q&usqp=CAU">
                    <h5 class="perfil-usuario-titulo">Título</h5>
                </div>
                <div class="col-md-8">
                    <div class="container">
                        <form id="form">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" value="<?= $nome ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="exemplo@exemplo.com">
                            </div>
                            <div class="form-group">
                                <label for="senha">Senha</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" id="senha" placeholder="">
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="submit">Mudar</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status">Status/Descrição</label>
                                <input type="email" class="form-control" id="status" placeholder="">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid border">
            <h4>Endereço</h4>
            <form>
                <div class="row">
                    <div class="form-row row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pais">País</label>
                                <input type="text" class="form-control" id="pais" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="uf">UF</label>
                                <select id="uf" class="form-control">
                                    <option selected>RS</option>
                                    <option>SC</option>
                                    <option>PR</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cidade">Cidade</label>
                                <input type="numero" class="form-control" id="cidade" placeholder="">
                            </div>
                        </div>
                    </div>

                    <div class="form-row row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="endereco">Endereço:</label>
                                <input type="text" class="form-control" id="endereco" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="numero">Número:</label>
                                <input type="numero" class="form-control" id="numero" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="complemento">Complemento:</label>
                                <input type="text" class="form-control" id="complemento" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <script type="text/javascript" src="../scripts/PerfilUsuario.js"></script>
</body>

</html>
<?php
function repositoryClass($myClass): UsuarioRepository
{
    return $myClass;
}
?>