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
$descricao = "";
$titulo = "";
$cep = "";
$rua = "";
$numero = "";
$complemento = "";
$bairro = "";
$cidade = "";
$estado = "";
$pais = "";

if (!is_null($idUsuario)) {

    $factory = new EntityManagerFactory();
    $repository = $factory->getEntityManager()->getRepository(Usuario::class);
    $repository = repositoryClass($repository);
    $usuario = $repository->findById($idUsuario);

    if (!is_null($usuario) && $usuario->getId() == $idUsuario) {
        $nome = $usuario->getNome();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();
        //$descricao = $usuario->getDescricao();
        $cep = $usuario->getCep();
        $rua = $usuario->getRua();
        $numero = $usuario->getNumero();
        $complemento = $usuario->getComplemento();
        $bairro = $usuario->getBairro();
        $cidade = $usuario->getCidade();
        $pais = $usuario->getPais();
        $estado = $usuario->getEstado();

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
    <div class="container">
        <div class="container-fluid p-3 my-3 border">
            <h3>Perfil</h3>
            <div class="container-fluid ">
                <div class="row">
                    <h4>Dados</h4>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <img class="perfil-usuario-imagem" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRh3sMJVjn4X-HocVUO5GcSBbpctWhzhpCU4Q&usqp=CAU">
                                <a id="btnEditarImagem" class="btn btn-primary icon-button edit-imagem-usuario" title="Editar imagem do perfil">
                                    <i class="far fa-edit"></i>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-11">
                                <h5 class="perfil-usuario-titulo">Título</h5>
                                <a id="btnEditarTitulo" class="btn btn-primary icon-button edit-titulo-usuario" title="Trocar título do perfil">
                                    <i class="far fa-edit"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="container">
                            <form id="form">
                                <div class="form-group">
                                    <label for="txtNome">Nome</label>
                                    <input type="text" class="form-control" id="txtNome" name="txtNome" value="<?= $nome ?>">
                                </div>
                                <div class="form-group">
                                    <label for="txtEmail">Email</label>
                                    <input type="email" class="form-control" id="txtEmail" name="txtEmail" value="<?= $email ?>">
                                </div>
                                <div class="form-group">
                                    <label for="txtSenha">Senha</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="txtSenha" name="txtSenha" value="<?= $senha ?>">
                                        <a id="btnEditarSenha" class="btn btn-primary input-group-text icon-button" title="Alterar a senha">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    </div>
                                </div>
                                <div id="divRepitaSenha" class="form-group">
                                    <label for="txtRepitaSenha">Repita a senha</label>
                                    <input type="password" class="form-control" id="txtRepitaSenha" name="txtRepitaSenha">

                                </div>
                                <div class="form-group">
                                    <label for="txtDescricao">Status/Descrição</label>
                                    <input type="text" class="form-control" id="txtDescricao" name="txtDescricao" value="<?= $descricao ?>">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid ">
                <h4>Endereço</h4>
                <form>
                    <div class="row">
                        <div class="form-row row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="txtCep">Cep</label>
                                    <input type="text" class="form-control" id="txtCep" name="txtCep" value="<?= $cep ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-row row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="txtRua">Rua</label>
                                    <input type="text" class="form-control" id="txtRua" name="txtRua" value="<?= $rua ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="txtNumero">Número</label>
                                    <input type="text" class="form-control" id="txtNumero" name="txtNumero" value="<?= $numero ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="txtComplemento">Complemento</label>
                                    <input type="text" class="form-control" id="txtComplemento" name="txtComplemento" value="<?= $complemento ?>">
                                </div>
                            </div>


                        </div>
                        <div class="form-row row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="txtBairro">Bairro</label>
                                    <input type="numero" class="form-control" id="txtBairro" name="txtBairro" value="<?= $bairro ?>">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="txtCidade">Cidade</label>
                                    <input type="numero" class="form-control" id="txtCidade" name="txtCidade" value="<?= $cidade ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="txtPais">País</label>
                                    <input type="text" class="form-control" id="txtPais" name="txtPais" value="<?= $pais ?>">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="cboEstado">UF</label>
                                    <select class="form-control" id="cboEstado" name="cboEstado" selected="<?= $estado ?>">
                                        <option value=""></option>
                                        <option value="AC">AC</option>
                                        <option value="AL">AL</option>
                                        <option value="AM">AM</option>
                                        <option value="AP">AP</option>
                                        <option value="BA">BA</option>
                                        <option value="CE">CE</option>
                                        <option value="DF">DF</option>
                                        <option value="ES">ES</option>
                                        <option value="GO">GO</option>
                                        <option value="MA">MA</option>
                                        <option value="MG">MG</option>
                                        <option value="MS">MS</option>
                                        <option value="MT">MT</option>
                                        <option value="PA">PA</option>
                                        <option value="PB">PB</option>
                                        <option value="PE">PE</option>
                                        <option value="PR">PR</option>
                                        <option value="PI">PI</option>
                                        <option value="RJ">RJ</option>
                                        <option value="RN">RN</option>
                                        <option value="RO">RO</option>
                                        <option value="RR">RR</option>
                                        <option value="RS">RS</option>
                                        <option value="SC">SC</option>
                                        <option value="SE">SE</option>
                                        <option value="SP">SP</option>
                                        <option value="TO">TO</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="row" style="padding: 10px;">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <div id="divEditarDados">
                                    <a id="btnEditarDados" class="btn btn-primary icon-button">Editar dados</a>
                                </div>
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <div id="divSalvarDados">
                                    <a id="btnCancelar" class="btn btn-danger icon-button">Cancelar</a>
                                    <button class="btn btn-success icon-button" type="submit">Salvar</button>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
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