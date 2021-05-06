<!DOCTYPE html>
<html>

<?php
include("header.php");
include("navbar.php");
?>

<body class="container-green-bg">

    <div class="container-fluid ">
        <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="card col-md-4">
                <div class="card-body">
                    <h5 class="card-title">Seja bem-vinda(o)!</h5>
                    <br />
                    <form action="../controller/SignupController.php" onsubmit="return validateForm()" method="get">
                        <div class="mb-3">
                            <label for="txtNomeCompleto" class="form-label">Nome completo</label>
                            <input type="text" class="form-control" name="txtNomeCompleto" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="txtEmail" class="form-label">E-mail</label>
                            <input type="email" class="form-control" name="txtEmail" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="txtSenha" class="form-label">Senha</label>
                            <input type="password" class="form-control" name="txtSenha">
                        </div>
                        <div class="mb-3">
                            <label for="txtRepitaSenha" class="form-label">Repita a senha</label>
                            <input type="password" class="form-control" name="txtRepitaSenha">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary bg-green">Criar conta</button>
                        <a id="btnCadastrarEmpresa" class="btn btn-primary icon-button btn-inverted" onclick="window.location.href='cadastro-empresa.php';">Cadastrar empresa</a>

                    </form>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
</body>

</html>