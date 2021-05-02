<?php

namespace greenbook\view;

use greenbook\helper\EntityManagerFactory;
use greenbook\model\TipoDeTarefa;
use greenbook\repository\TipoDeTarefaRepository;

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
                                    <th class="cadastro-tarefa-tabela-col3">Pontos</th>
                                    <th class="cadastro-tarefa-tabela-col4">Moedas</th>
                                    <th class="cadastro-tarefa-tabela-col5">Eliminar</th>
                                </tr>
                            </thead>
                        </table>
                        <div class="tabela scrollable">
                            <table class="table table-hover table-striped table-bordered table-condensed">
                                <tbody>
                                    <?php
                                    /*foreach ($tiposTarefas as $linha) {
                                        echo '<tr>';
                                        echo '<td class="cadastro-produtos-tabela-col1">' . $linhaP->getFornecedor()->getNome() . '</td>';
                                        echo '<td class="cadastro-produtos-tabela-col2">';
                                        echo '<input type="submit" onclick="botaoEditar(
                                    \'' . $linhaP->getFornecedor()->getNome() . '\',\'' . $linhaP->getNome() . '\',\'' . $linhaP->getDescricao()
                                            . '\',\'' . $linhaP->getEstoque()->getQuantidade() . '\',\'' . $linhaP->getEstoque()->getPreco() . '\'' . ',' . $linhaP->getID() . ')" name="edit" value="Editar"/>';
                                        echo '</td>';
                                        echo '<td class="cadastro-produtos-tabela-col3">' . $linhaP->getID() . '</td>';
                                        echo '<td class="cadastro-produtos-tabela-col4">' . $linhaP->getNome() . '</td>';
                                        echo '<td class="cadastro-produtos-tabela-col5">' . $linhaP->getDescricao() . '</td>';
                                        echo '<td class="cadastro-produtos-tabela-col6">' . $linhaP->getEstoque()->getQuantidade() . '</td>';
                                        echo '<td class="cadastro-produtos-tabela-col7">' . $linhaP->getEstoque()->getPreco() . '</td>';
                                        echo '<form method="post" action="../controller/EliminarProdutoController.php">';
                                        echo '<td class="cadastro-produtos-tabela-col8">';
                                        echo '<input type="submit" name="clicked[' . $linhaP->getID() . ']" value="Eliminar"/>';
                                        echo '</td>';
                                        echo '</form>';
                                        echo '</tr>';
                                    }*/
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="container-fluid border">
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
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
</body>

</html>