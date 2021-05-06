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
                    <h5 class="card-title">Cadastre sua empresa!</h5>
                    <br />
                    <form action="../controller/CadastroEmpresaController.php" method="get">
                        <div class="mb-3">
                            <label for="txtRazao" class="form-label">Razão Social</label>
                            <input type="text" class="form-control" name="txtRazao">
                        </div>
                        <div class="mb-3">
                            <label for="txtFantasia" class="form-label">Nome Fantasia</label>
                            <input type="text" class="form-control" name="txtFantasia">
                        </div>
                        <div class="mb-3">
                            <label for="txtEmail" class="form-label">E-mail</label>
                            <input type="email" class="form-control" name="txtEmail">
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
                        <a id="btnCadastrarUsuario" class="btn btn-primary icon-button btn-inverted" onclick="window.location.href='signup.php';">Cadastrar pessoa física</a>

                    </form>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
</body>

</html>