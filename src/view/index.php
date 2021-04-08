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
                <p>aqui vai uma foto</p>
            </div>
            <div class="col-lg-6">
                <h2>Grenbook</h2>
                <h6>Quem somos?</h6>
                <p>teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste
                    teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste
                    teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste
                    teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste
                    teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste
                    teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste
                </p>
                <div>
                    <button class="btn btn-outline-success navbar-button home-button-fazer-parte">Fazer parte</button>
                </div>
            </div>

        </div>

    </div>

    <div class="container-fluid p-3 my-3 bg-green">
        <div class="row">
            <div class="col-md-4">
                <div class="container p-3 my-3 bg-success home-container-ranking">
                    <h2 class="home-text-ranking">Ranking</h2>
                    <div class="table-responsive-xl">
                        <table class="home-table">
                            <tr>
                                <th class="home-table-header-col1">Posição</th>
                                <th class="home-table-header-col2">Pontos</th>
                                <th class="home-table-header-col3">Nome</th>
                            </tr>
                            <tr>
                                <td style="text-align: center; border: 1px solid black; border-collapse: collapse;">1º</td>
                                <td style="text-align: center; border: 1px solid black; border-collapse: collapse;">100</td>
                                <td style="text-align: center; border: 1px solid black; border-collapse: collapse;">José</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-8 home-companies">
                <h5>Empresas apoiadoras</h5>
                <div class="container-fluid p-3 my-3 border">
                    <div class="row">
                        <div class="col-md-4">
                            <p>imagem da empresa 1</p>
                        </div>
                        <div class="col-md-8">texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                        </div>
                    </div>
                </div>
                <div class="container-fluid p-3 my-3 border">
                    <div class="row">
                        <div class="col-md-4">
                            <p>imagem da empresa 2</p>
                        </div>
                        <div class="col-md-8">texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                        </div>
                    </div>
                </div>
                <div class="container-fluid p-3 my-3 border">
                    <div class="row">
                        <div class="col-md-4">
                            <p>imagem da empresa 3</p>
                        </div>
                        <div class="col-md-8">texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</body>

</html>