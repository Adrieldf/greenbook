<?php

namespace greenbook\view;

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

<body>
    <div class="container-fluid p-3 my-3 border">
        <div class="row">
            <div class="col-lg-6">
                <h2>Bem vindo</h2>
                <ul class="nav nav-tabs justify-content-center">
                    <li class="nav-item usuario-tab">
                        <a class="nav-link active" href="#">Missões</a>
                    </li>
                    <li class="nav-item usuario-tab">
                        <a class="nav-link" href="#">Títulos</a>
                    </li>
                    <li class="nav-item usuario-tab">
                        <a class="nav-link" href="#">Loja</a>
                    </li>
                    <li class="nav-item usuario-tab">
                        <a class="nav-link" href="#">Ranking</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-9">
                        <h5>Posts da comunidade</h5>
                    </div>
                    <div class="col-lg-3">
                        <button type="button" class="btn btn-success" style="float: right;">Criar Post</button>
                    </div>

                </div>
                <div class="container-fluid border">
                </div>
            </div>
        </div>
    </div>
</body>

</html>