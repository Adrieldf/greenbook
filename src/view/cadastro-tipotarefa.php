<?php

namespace greenbook\view;

require_once __DIR__ . '\..\controller\MainController.php';
require_once __DIR__ . '\..\..\vendor\autoload.php';

use greenbook\helper\EntityManagerFactory;
use greenbook\model\TipoDeTarefa;
use greenbook\repository\TipoDeTarefaRepository;

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
                                    <?php
                                    foreach ($tiposTarefas as $linha) {
                                        echo '<tr>';
                                        echo '<td class="cadastro-tipotarefa-tabela-col1">';
                                        echo '<input type="submit" onclick="botaoEditarTipoTarefa(
                                    \'' . $linha->getNome() . '\',' . $linha->getID() . ')" name="edit" value="Editar"/>';
                                        echo '</td>';
                                        echo '<td class="cadastro-tipotarefa-tabela-col1">' . $linha->getID() . '</td>';
                                        echo '<td class="cadastro-tipotarefa-tabela-col1">' . $linha->getNome() . '</td>';
                                        echo '<form method="post" action="../controller/EliminaTipoDeTarefaController.php">';
                                        echo '<td class="cadastro-tipotarefa-tabela-col1">';
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
                    <div class="container-fluid border cadastro-form" id="insert">
                        <form class="cadastro-form" method="POST" action="../controller/CadastroTipoDeTarefaController.php">
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
                    <div class="container-fluid border cadastro-form" id="update" style="display:none">
                        <form class="cadastro-form" method="POST" action="../controller/AtualizaTipoDeTarefaController.php">
                            <div class="form-row row">
                                <div class="form-group col-md-4">
                                    <label for="nome">Nome tarefa</label>
                                    <input type="text" class="form-control" id="txtTarefaUpdate" name="txtTarefaUpdate">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="idEdit">ID selecionado: </label>
                                    <input type="text" class="form-control" id="txtIdEdit" name="txtIdEdit" readonly>
                                </div>
                                <div class="form-group col-md-1 botao-salvar-tarefa">
                                    <input type="submit" class="btn btn-success" value="Salvar" />
                                </div>
                                <div class="form-group col-md-1 botao-cancelar-tarefa">
                                    <input type="button" class="btn btn-danger" value="Cancelar" onclick="botaoCancelarTipoTarefa()" />
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