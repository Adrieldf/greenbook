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
                <ul class="nav nav-tabs">
                    <li class="nav-item usuario-tab">
                        <a class="nav-link active" data-toggle="tab" href="#home">Tarefas</a>
                    </li>
                    <li class="nav-item usuario-tab">
                        <a class="nav-link" data-toggle="tab" href="#menu1">Títulos</a>
                    </li>
                    <li class="nav-item usuario-tab">
                        <a class="nav-link" data-toggle="tab" href="#menu2">Loja</a>
                    </li>
                    <li class="nav-item usuario-tab">
                        <a class="nav-link" data-toggle="tab" href="#menu3">Ranking</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="home" class="container tab-pane active"><br>
                        <h3>HOME</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <div id="menu1" class="container tab-pane fade"><br>
                        <h3>Menu 1</h3>
                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    <div id="menu2" class="container tab-pane fade"><br>
                        <h3>Menu 2</h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                    </div>
                    <div id="menu3" class="container tab-pane fade"><br>
                        <h3>Menu 2</h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                    </div>
                </div>
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
    <script>
        function clica() {
            alert("2");
            var x = document.getElementById("menu4");
            x.style.display = "show";
        }
    </script>
</body>

</html>