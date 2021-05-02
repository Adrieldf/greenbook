<?php

namespace greenbook\view;

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Tarefa;
use greenbook\model\TipoDeTarefa;
use greenbook\repository\TipoDeTarefaRepository;
use greenbook\repository\TarefaRepository;

require_once __DIR__ . '\..\controller\MainController.php';
require_once __DIR__ . '\..\..\vendor\autoload.php';
require_once("header.php");
?>
<!DOCTYPE html>
<html>

<?php
include("header.php");
include("navbar.php");

$factory = new EntityManagerFactory();
$entityManager = $factory->getEntityManager();

$tipoRepository = $entityManager->getRepository(TipoDeTarefa::class);
$tipoRepository = tipoRepositoryClass($tipoRepository);

$tiposTarefas = $tipoRepository->findAll();

$tarefaRepository = $entityManager->getRepository(Tarefa::class);
$tarefaRepository = tarefaRepositoryClass($tarefaRepository);

$tarefas = $tarefaRepository->findAll();

function tarefaRepositoryClass($myClass): TarefaRepository
{
    return $myClass;
}
function tipoRepositoryClass($myClass): TipoDeTarefaRepository
{
    return $myClass;
}


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
                                    <th class="cadastro-tarefa-tabela-col3">Tipo tarefa</th>
                                    <th class="cadastro-tarefa-tabela-col4">Pontos</th>
                                    <th class="cadastro-tarefa-tabela-col5">Moedas</th>
                                    <th class="cadastro-tarefa-tabela-col6">Eliminar</th>
                                </tr>
                            </thead>
                        </table>
                        <div class="tabela scrollable">
                            <table class="table table-hover table-striped table-bordered table-condensed">
                                <tbody>
                                    <?php
                                    foreach ($tarefas as $linha) {
                                        echo '<tr>';
                                        echo '<td class="cadastro-tarefa-tabela-col1">';
                                        echo '<input type="submit" onclick="botaoEditarTarefa(
                                            \'' . $linha->getDescricao() . '\',\'' . $linha->getTipoDeTarefa()->getNome() . '\',' . $linha->getValorEmPontos()
                                            . ',' . $linha->getValorEmMoedas() . ',' . $linha->getId()
                                            . ')" name="edit" value="Editar"/>';
                                        echo '</td>';
                                        echo '<td class="cadastro-tarefa-tabela-col2">' . $linha->getID() . '</td>';
                                        echo '<td class="cadastro-tarefa-tabela-col3">' . $linha->getTipoDeTarefa()->getNome() . '</td>';
                                        echo '<td class="cadastro-tarefa-tabela-col4">' . $linha->getValorEmPontos() . '</td>';
                                        echo '<td class="cadastro-tarefa-tabela-col5">' . $linha->getValorEmMoedas() . '</td>';
                                        echo '<form method="post" action="../controller/EliminaTarefaController.php">';
                                        echo '<td class="cadastro-tarefa-tabela-col6">';
                                        echo '<input type="submit" name="clicked[' . $linha->getID() . ']" value="Eliminar"/>';
                                        echo '</td>';
                                        echo '</form>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="container-fluid border" id="insert">
                    <form class="cadastro-form" method="POST" action="../controller/CadastroTarefaController.php">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Descrição da tarefa</label>
                            <textarea class="form-control" id="txtTarefa" name="txtTarefa" rows="2"></textarea>
                        </div>
                        <div class="form-row row">
                            <div class="form-group col-md-3">
                                <label for="tipo">Tipo de tarefa</label>
                                <select id="txtTipoTarefa" name="txtTipoTarefa" class="form-control">
                                    <?php
                                    foreach ($tiposTarefas as $linha) {
                                        echo '<option>' . $linha->getNome() . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="pontos">Pontos</label>
                                <input type="text" class="form-control" id="txtPontos" name="txtPontos">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="moedas">Moedas</label>
                                <input type="text" class="form-control" id="txtMoedas" name="txtMoedas">
                            </div>
                            <div class="form-group col-md-1 botao-salvar-tarefa">
                                <input type="submit" class="btn btn-success" value="Salvar" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="container-fluid border" id="update" style="display:none">
                    <form class="cadastro-form" method="POST" action="../controller/AtualizaTarefaController.php">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Descrição da tarefa</label>
                            <textarea class="form-control" id="txtTarefaUpdate" name="txtTarefaUpdate" rows="2"></textarea>
                        </div>
                        <div class="form-row row">
                            <div class="form-group col-md-3">
                                <label for="tipo">Tipo de tarefa</label>
                                <select id="txtTipoTarefaUpdate" name="txtTipoTarefaUpdate" class="form-control">
                                    <?php
                                    foreach ($tiposTarefas as $linha) {
                                        echo '<option>' . $linha->getNome() . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="pontos">Pontos</label>
                                <input type="text" class="form-control" id="txtPontosUpdate" name="txtPontosUpdate">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="moedas">Moedas</label>
                                <input type="text" class="form-control" id="txtMoedasUpdate" name="txtMoedasUpdate">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="idEdit">ID selecionado: </label>
                                <input type="text" class="form-control" id="txtIdEdit" name="txtIdEdit" readonly>
                            </div>
                            <div class="form-group col-md-1 botao-salvar-tarefa">
                                <input type="submit" class="btn btn-success" value="Salvar" />
                            </div>
                            <div class="form-group col-md-1 botao-cancelar-tarefa">
                                <input type="button" class="btn btn-danger" value="Cancelar" onclick="botaoCancelarTarefa()" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../scripts/CadastroTarefas.js"></script>
</body>

</html>