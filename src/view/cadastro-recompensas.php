<?php

namespace greenbook\view;

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Recompensa;
use greenbook\repository\RecompensaRepository;

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
$recompensaRepository = $entityManager->getRepository(Recompensa::class);
$recompensaRepository = recompensaRepositoryClass($recompensaRepository);

$tiposTarefas = $recompensaRepository->findAll();

function recompensaRepositoryClass($myClass): RecompensaRepository
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
                                    <th class="cadastro-recompensa-tabela-col1">Editar</th>
                                    <th class="cadastro-recompensa-tabela-col2">ID</th>
                                    <th class="cadastro-recompensa-tabela-col3">Descrição</th>
                                    <th class="cadastro-recompensa-tabela-col4">Valor</th>
                                    <th class="cadastro-recompensa-tabela-col5">Eliminar</th>
                                </tr>
                            </thead>
                        </table>
                        <div class="tabela scrollable">
                            <table class="table table-hover table-striped table-bordered table-condensed">
                                <tbody>
                                    <?php
                                    foreach ($tiposTarefas as $linha) {
                                        echo '<tr>';
                                        echo '<td class="cadastro-recompensa-tabela-col1">';
                                        echo '<input type="submit" onclick="botaoEditarRecompensa(
                                            \'' . $linha->getDescricao() . '\',' . $linha->getId() . ',' . $linha->getValor()
                                            . ')" name="edit" value="Editar"/>';
                                        echo '</td>';
                                        echo '<td class="cadastro-recompensa-tabela-col2">' . $linha->getID() . '</td>';
                                        echo '<td class="cadastro-recompensa-tabela-col3">' . $linha->getDescricao() . '</td>';
                                        echo '<td class="cadastro-recompensa-tabela-col4">' . $linha->getValor() . '</td>';
                                        echo '<form method="post" action="../controller/EliminaRecompensaController.php">';
                                        echo '<td class="cadastro-recompensa-tabela-col5">';
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
                    <form class="cadastro-form" method="POST" action="../controller/CadastroRecompensaController.php">
                        <div class="form-row row">
                            <div class="form-group col-md-9">
                                <label for="pontos">Descrição</label>
                                <input type="text" class="form-control" id="txtDescricao" name="txtDescricao">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="pontos">Valor</label>
                                <input type="text" class="form-control" id="txtValor" name="txtValor">
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="form-group col-md-1 botao-salvar-tarefa">
                                <input type="submit" class="btn btn-success" value="Salvar" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="container-fluid border" id="update" style="display:none">
                    <form class="cadastro-form" method="POST" action="../controller/AtualizaRecompensaController.php">
                        <div class="form-row row">
                            <div class="form-group col-md-9">
                                <label for="pontos">Descrição</label>
                                <input type="text" class="form-control" id="txtDescricaoUpdate" name="txtDescricaoUpdate">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="pontos">Valor</label>
                                <input type="text" class="form-control" id="txtValorUpdate" name="txtValorUpdate">
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="form-group col-md-2">
                                <label for="idEdit">ID selecionado: </label>
                                <input type="text" class="form-control" id="txtIdEdit" name="txtIdEdit" readonly>
                            </div>
                            <div class="form-group col-md-1 botao-salvar-tarefa">
                                <input type="submit" class="btn btn-success" value="Salvar" />
                            </div>
                            <div class="form-group col-md-1 botao-cancelar-tarefa">
                                <input type="button" class="btn btn-danger" value="Cancelar" onclick="botaoCancelarRecompensa()" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../scripts/CadastroRecompensa.js"></script>
</body>

</html>