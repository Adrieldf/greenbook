<!DOCTYPE html>
<html>

<?php
include("header.php");
include("navbar.php");
?>

<body>


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
                                <label for="txtEmail" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="txtEmail" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="txtSenha" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="txtSenha">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary bg-green">Login</button> 
                        </form>
                    </div>
                </div>
                <div class="col"></div>
            </div>
    </body>
</body>

</html>