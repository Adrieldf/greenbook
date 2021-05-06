<?php

namespace greenbook\view;

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Empresa;
use greenbook\repository\EmpresaRepository;

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
$idEmpresa = @$_GET["id"];
$id = "";
$razao = "";
$fantasia = "";
$email = "";
$senha = "";
$senhaAntiga = "";

if (!is_null($idEmpresa)) {

    $factory = new EntityManagerFactory();
    $repository = $factory->getEntityManager()->getRepository(Empresa::class);
    $repository = repositoryClass($repository);
    $empresa = $repository->findById($idEmpresa);

    if (!is_null($empresa) && $empresa->getId() == $idEmpresa) {
        $razao = $empresa->getRazaoSocial();
        $fantasia = $empresa->getNomeFantasia();
        $email = $empresa->getEmail();
        $senha = $empresa->getSenha();
        $senhaAntiga = $empresa->getSenha();
    
    }
}
?>

<body>
    <div class="container">
        <div class="container-fluid p-3 my-3 border">
            <h3>Dados da empresa</h3>
            <div class="container-fluid ">
                <form id="form" action="../controller/AtualizaPerfilEmpresaController.php" onsubmit="return validateForm()" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" id="idEmpresa" name="idEmpresa" value="<?= $idEmpresa ?>">
                            <input type="hidden" id="senhaAntiga" name="senhaAntiga" value="<?= $senhaAntiga ?>">
                            <div class="form-group">
                                <label for="txtNome">Razão Social</label>
                                <input type="text" class="form-control" id="txtRazao" name="txtRazao" value="<?= $razao ?>">
                            </div>
                            <div class="form-group">
                                <label for="txtNome">Nome Fantasia</label>
                                <input type="text" class="form-control" id="txtFantasia" name="txtFantasia" value="<?= $fantasia ?>">
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
                            <div class="row">
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
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../scripts/PerfilEmpresa.js"></script>
</body>

</html>
<?php
function repositoryClass($myClass): EmpresaRepository
{
    return $myClass;
}
?>