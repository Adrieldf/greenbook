<!DOCTYPE html>
<html>

<?php
include("header.php");
include("navbar.php");
?>

<body class="container-green-bg">

    <div class="container ">
        <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col"></div>
            <div class="card col-xs-12">
                <div class="card-body">
                    <h5 class="card-title">Seja bem-vinda(o)!</h5>
                    <br />
                    <form>
                        <div class="mb-3">
                            <label for="txtNomeCompleto" class="form-label">Nome completo</label>
                            <input type="text" class="form-control" id="txtNomeCompleto" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="txtEmail" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="txtEmail" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="txtSenha" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="txtSenha">
                        </div>
                        <div class="mb-3">
                            <label for="txtRepitaSenha" class="form-label">Repita a senha</label>
                            <input type="password" class="form-control" id="txtRepitaSenha">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary bg-green">Criar conta</button>
                     
                    </form>
                </div>
            </div>
            <div class="col"></div>
        </div>
</body>

</html>