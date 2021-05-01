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
    <div class="container-fluid p-3 my-3">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="container-fluid border ">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-condensed ">
                            <thead>
                                <tr>
                                    <th class="cadastro-recompensa-tabela-col1">Editar</th>
                                    <th class="cadastro-recompensa-tabela-col2">ID</th>
                                    <th class="cadastro-recompensa-tabela-col3">Nome</th>
                                    <th class="cadastro-recompensa-tabela-col4">Descrição</th>
                                    <th class="cadastro-recompensa-tabela-col5">Valor</th>
                                    <th class="cadastro-recompensa-tabela-col6">Eliminar</th>
                                </tr>
                            </thead>
                        </table>
                        <div class="tabela scrollable">
                            <table class="table table-hover table-striped table-bordered table-condensed">
                                <tbody>
                                    <tr>
                                        <td class="cadastro-recompensa-tabela-col1">Editar</td>
                                        <td class="cadastro-recompensa-tabela-col2">Otto</td>
                                        <td class="cadastro-recompensa-tabela-col3">@mdo</td>
                                        <td class="cadastro-recompensa-tabela-col4">Mark</td>
                                        <td class="cadastro-recompensa-tabela-col5">Eliminar</td>
                                        <td class="cadastro-recompensa-tabela-col6">Eliminar</td>
                                    </tr>
                                    <tr>
                                        <td class="cadastro-recompensa-tabela-col1">Editar</td>
                                        <td class="cadastro-recompensa-tabela-col2">Otto</td>
                                        <td class="cadastro-recompensa-tabela-col3">@mdo</td>
                                        <td class="cadastro-recompensa-tabela-col4">Mark</td>
                                        <td class="cadastro-recompensa-tabela-col5">Eliminar</td>
                                        <td class="cadastro-recompensa-tabela-col6">Eliminar</td>
                                    </tr>
                                    <tr>
                                        <td class="cadastro-recompensa-tabela-col1">Editar</td>
                                        <td class="cadastro-recompensa-tabela-col2">Otto</td>
                                        <td class="cadastro-recompensa-tabela-col3">@mdo</td>
                                        <td class="cadastro-recompensa-tabela-col4">Mark</td>
                                        <td class="cadastro-recompensa-tabela-col5">Eliminar</td>
                                        <td class="cadastro-recompensa-tabela-col6">Eliminar</td>
                                    </tr>
                                    <tr>
                                        <td class="cadastro-recompensa-tabela-col1">Editar</td>
                                        <td class="cadastro-recompensa-tabela-col2">Otto</td>
                                        <td class="cadastro-recompensa-tabela-col3">@mdo</td>
                                        <td class="cadastro-recompensa-tabela-col4">Mark</td>
                                        <td class="cadastro-recompensa-tabela-col5">Eliminar</td>
                                        <td class="cadastro-recompensa-tabela-col6">Eliminar</td>
                                    </tr>
                                    <tr>
                                        <td class="cadastro-recompensa-tabela-col1">Editar</td>
                                        <td class="cadastro-recompensa-tabela-col2">Otto</td>
                                        <td class="cadastro-recompensa-tabela-col3">@mdo</td>
                                        <td class="cadastro-recompensa-tabela-col4">Mark</td>
                                        <td class="cadastro-recompensa-tabela-col5">Eliminar</td>
                                        <td class="cadastro-recompensa-tabela-col6">Eliminar</td>
                                    </tr>
                                    <tr>
                                        <td class="cadastro-recompensa-tabela-col1">Editar</td>
                                        <td class="cadastro-recompensa-tabela-col2">Otto</td>
                                        <td class="cadastro-recompensa-tabela-col3">@mdo</td>
                                        <td class="cadastro-recompensa-tabela-col4">Mark</td>
                                        <td class="cadastro-recompensa-tabela-col5">Eliminar</td>
                                        <td class="cadastro-recompensa-tabela-col6">Eliminar</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="container-fluid border">
                        <form class="cadastro-form">
                            <div class="form-row row">
                                <div class="form-group col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="titulo" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Título
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="recompensa" value="option2">
                                        <label class="form-check-label" for="exampleRadios2">
                                            Recompensa
                                        </label>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
</body>

</html>