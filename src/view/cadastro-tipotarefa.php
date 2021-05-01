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
                                    <th class="cadastro-tipotarefa-tabela-col1">Editar</th>
                                    <th class="cadastro-tipotarefa-tabela-col1">ID</th>
                                    <th class="cadastro-tipotarefa-tabela-col1">Nome</th>
                                    <th class="cadastro-tipotarefa-tabela-col1">Eliminar</th>
                                </tr>
                            </thead>
                        </table>
                        <div class="tabela scrollable">
                            <table class="table table-hover table-striped table-bordered table-condensed">
                                <tbody>
                                    <tr>
                                        <td class="cadastro-tipotarefa-tabela-col1">Editar</td>
                                        <td class="cadastro-tipotarefa-tabela-col1">Otto</td>
                                        <td class="cadastro-tipotarefa-tabela-col1">@mdo</td>
                                        <td class="cadastro-tipotarefa-tabela-col1">Mark</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="container-fluid border cadastro-form">
                        <form class="cadastro-form" method="POST" action="../controller/CadastroTipoDeTarefa.php">
                            <div class="form-row row">
                                <div class="form-group col-md-4">
                                    <label for="nome">Nome tarefa</label>
                                    <input type="text" class="form-control" id="txtTarefa" name="txtTarefa">
                                </div>
                                <div class="form-group col-md-1 botao-salvar-tarefa">
                                    <input type="submit" class="btn btn-success" value="Salvar" />
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