<!DOCTYPE html>
<html>

<?php
include("header.php");
include("navbar.php");
?>

<body>


    <body class="container-green-bg">

        <div class="container-fluid ">
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="card col-md-4">
                    <div class="card-body">
                        <h5 class="card-title">Seja bem-vinda(o)!</h5>
                        <br />
                        <form action="../controller/LoginController.php" method="POST" >
                            <div class="mb-3">
                                <label for="txtEmail" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="txtEmail" name="txtEmail" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="txtSenha" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="txtSenha" name="txtSenha">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary bg-green">Login</button> 
                        </form>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
    </body>
</body>

</html>