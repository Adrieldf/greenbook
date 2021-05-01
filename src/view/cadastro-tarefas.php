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
                                    <th class="cadastro-tarefa-tabela-col1">Editar</th>
                                    <th class="cadastro-tarefa-tabela-col2">ID Tarefa</th>
                                    <th class="cadastro-tarefa-tabela-col3">Pontos</th>
                                    <th class="cadastro-tarefa-tabela-col4">Moedas</th>
                                    <th class="cadastro-tarefa-tabela-col5">Eliminar</th>
                                </tr>
                            </thead>
                        </table>
                        <div class="tabela scrollable">
                            <table class="table table-hover table-striped table-bordered table-condensed">
                                <tbody>
                                    <tr>
                                        <td class="cadastro-tarefa-tabela-col1">Editar</td>
                                        <td class="cadastro-tarefa-tabela-col2">Otto</td>
                                        <td class="cadastro-tarefa-tabela-col3">@mdo</td>
                                        <td class="cadastro-tarefa-tabela-col4">Mark</td>
                                        <td class="cadastro-tarefa-tabela-col5">Eliminar</td>
                                    </tr>
                                    <tr>
                                        <td class="cadastro-tarefa-tabela-col1">Editar</td>
                                        <td class="cadastro-tarefa-tabela-col2">Otto</td>
                                        <td class="cadastro-tarefa-tabela-col3">@mdo</td>
                                        <td class="cadastro-tarefa-tabela-col4">Mark</td>
                                        <td class="cadastro-tarefa-tabela-col5">Eliminar</td>
                                    </tr>
                                    <tr>
                                        <td class="cadastro-tarefa-tabela-col1">Editar</td>
                                        <td class="cadastro-tarefa-tabela-col2">Otto</td>
                                        <td class="cadastro-tarefa-tabela-col3">@mdo</td>
                                        <td class="cadastro-tarefa-tabela-col4">Mark</td>
                                        <td class="cadastro-tarefa-tabela-col5">Eliminar</td>
                                    </tr>
                                    <tr>
                                        <td class="cadastro-tarefa-tabela-col1">Editar</td>
                                        <td class="cadastro-tarefa-tabela-col2">Otto</td>
                                        <td class="cadastro-tarefa-tabela-col3">@mdo</td>
                                        <td class="cadastro-tarefa-tabela-col4">Mark</td>
                                        <td class="cadastro-tarefa-tabela-col5">Eliminar</td>
                                    </tr>
                                    <tr>
                                        <td class="cadastro-tarefa-tabela-col1">Editar</td>
                                        <td class="cadastro-tarefa-tabela-col2">Otto</td>
                                        <td class="cadastro-tarefa-tabela-col3">@mdo</td>
                                        <td class="cadastro-tarefa-tabela-col4">Mark</td>
                                        <td class="cadastro-tarefa-tabela-col5">Eliminar</td>
                                    </tr>
                                    <tr>
                                        <td class="cadastro-tarefa-tabela-col1">Editar</td>
                                        <td class="cadastro-tarefa-tabela-col2">Otto</td>
                                        <td class="cadastro-tarefa-tabela-col3">@mdo</td>
                                        <td class="cadastro-tarefa-tabela-col4">Mark</td>
                                        <td class="cadastro-tarefa-tabela-col5">Eliminar</td>
                                    </tr>
                                    <tr>
                                        <td class="cadastro-tarefa-tabela-col1">Editar</td>
                                        <td class="cadastro-tarefa-tabela-col2">Otto</td>
                                        <td class="cadastro-tarefa-tabela-col3">@mdo</td>
                                        <td class="cadastro-tarefa-tabela-col4">Mark</td>
                                        <td class="cadastro-tarefa-tabela-col5">Eliminar</td>
                                    </tr>
                                    <tr>
                                        <td class="cadastro-tarefa-tabela-col1">Editar</td>
                                        <td class="cadastro-tarefa-tabela-col2">Otto</td>
                                        <td class="cadastro-tarefa-tabela-col3">@mdo</td>
                                        <td class="cadastro-tarefa-tabela-col4">Mark</td>
                                        <td class="cadastro-tarefa-tabela-col5">Eliminar</td>
                                    </tr>
                                    <tr>
                                        <td class="cadastro-tarefa-tabela-col1">Editar</td>
                                        <td class="cadastro-tarefa-tabela-col2">Otto</td>
                                        <td class="cadastro-tarefa-tabela-col3">@mdo</td>
                                        <td class="cadastro-tarefa-tabela-col4">Mark</td>
                                        <td class="cadastro-tarefa-tabela-col5">Eliminar</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="container-fluid border">
                    <form class="cadastro-form" method="POST" action="../controller/CadastroTarefaController.php">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Descrição da tarefa</label>
                            <textarea class="form-control" id="txtTarefa" name="txtTarefa"rows="2"></textarea>
                        </div>
                        <div class="form-row row">
                            <div class="form-group col-md-3">
                                <label for="pontos">Pontos</label>
                                <input type="text" class="form-control" id="txtPontos" name="txtPontos">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="moedas">Moedas</label>
                                <input type="text" class="form-control" id="txtMoedas" name="txtMoedas">
                            </div>
                            <div class="form-group col-md-1 botao-salvar-tarefa">
                                <input type="submit" class="btn btn-success" value="Salvar" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
</body>

</html>