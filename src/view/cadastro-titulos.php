<?php

namespace greenbook\view;

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Titulo;
use greenbook\repository\TituloRepository;

require_once __DIR__ . '\..\controller\MainController.php';
require_once __DIR__ . '\..\..\vendor\autoload.php';
require_once("header.php");
?>
<!DOCTYPE html>
<html>

<?php
include("header.php");
include("navbar.php");

$id = @$_GET["Id"];
$nome = @$_GET["nome"];

$factory = new EntityManagerFactory();
$entityManager = $factory->getEntityManager();
$tituloRepository = $entityManager->getRepository(Titulo::class);
$tituloRepository = tituloRepositoryClass($tituloRepository);

$titulos = $tituloRepository->findAll();

function tituloRepositoryClass($myClass): TituloRepository
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
                    <form method="get" action="#">
                        <div class="col-md-12 cadastro-form">
                            <div class="form-row row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="endereco">ID</label>
                                        <input type="text" class="form-control" id="Id" name="Id" value="<?= $id ?>">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="numero">Nome</label>
                                        <input type="numero" class="form-control" id="nome" name="nome" value="<?= $nome ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary botao-pesquisar" value="Pesquisar" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="container-fluid border">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-condensed ">
                            <thead>
                                <tr>
                                    <th class="cadastro-titulo-tabela-col1">Editar</th>
                                    <th class="cadastro-titulo-tabela-col2">ID</th>
                                    <th class="cadastro-titulo-tabela-col3">Nome</th>
                                    <th class="cadastro-titulo-tabela-col4">Descrição</th>
                                    <th class="cadastro-titulo-tabela-col5">Valor</th>
                                    <th class="cadastro-titulo-tabela-col6">Eliminar</th>
                                </tr>
                            </thead>
                        </table>
                        <div class="tabela scrollable">
                            <table class="table table-hover table-striped table-bordered table-condensed">
                                <tbody>
                                    <?php
                                    foreach ($titulos as $linha) {
                                        if (!empty($_GET["Id"])) {
                                            if ($linha->getID() != $_GET["Id"]) {
                                                continue;
                                            }
                                        }
                                        if (!empty($_GET["nome"])) {
                                            if ($linha->getNome() != $_GET["nome"]) {
                                                continue;
                                            }
                                        }

                                        echo '<tr>';
                                        echo '<td class="cadastro-titulo-tabela-col1">';
                                        echo '<input type="submit" onclick="botaoEditarTitulo(
                                            \'' . $linha->getNome() . '\',\'' . $linha->getDescricao() . '\',' .
                                            $linha->getValor() . ',' . $linha->getID()
                                            . ')" name="edit" value="Editar"/>';
                                        echo '</td>';
                                        echo '<td class="cadastro-titulo-tabela-col2">' . $linha->getID() . '</td>';
                                        echo '<td class="cadastro-titulo-tabela-col3">' . $linha->getNome() . '</td>';
                                        echo '<td class="cadastro-titulo-tabela-col4">' . $linha->getDescricao() . '</td>';
                                        echo '<td class="cadastro-titulo-tabela-col5">' . $linha->getValor() . '</td>';
                                        echo '<form method="post" action="../controller/EliminaTituloController.php">';
                                        echo '<td class="cadastro-titulo-tabela-col6">';
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
                    <form class="cadastro-form" method="POST" action="../controller/CadastroTituloController.php">
                        <div class="form-row row">
                            <div class="form-group col-md-4">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" id="txtNome" name="txtNome">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="pontos">Descrição</label>
                                <input type="text" class="form-control" id="txtDescricao" name="txtDescricao">
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="form-group col-md-3">
                                <label for="pontos">Valor</label>
                                <input type="text" class="form-control" id="txtValor" name="txtValor">
                            </div>
                            <div class="form-group col-md-1 botao-salvar-tarefa">
                                <input type="submit" class="btn btn-success" value="Salvar" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="container-fluid border" id="update" style="display:none">
                    <form class="cadastro-form" method="POST" action="../controller/AtualizaTituloController.php">
                        <div class="form-row row">
                            <div class="form-group col-md-4">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" id="txtNomeUpdate" name="txtNomeUpdate">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="pontos">Descrição</label>
                                <input type="text" class="form-control" id="txtDescricaoUpdate" name="txtDescricaoUpdate">
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="form-group col-md-3">
                                <label for="pontos">Valor</label>
                                <input type="text" class="form-control" id="txtValorUpdate" name="txtValorUpdate">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="idEdit">ID selecionado: </label>
                                <input type="text" class="form-control" id="txtIdEdit" name="txtIdEdit" readonly>
                            </div>
                            <div class="form-group col-md-1 botao-salvar-tarefa">
                                <input type="submit" class="btn btn-success" value="Salvar" />
                            </div>
                            <div class="form-group col-md-1 botao-cancelar-tarefa">
                                <input type="button" class="btn btn-danger" value="Cancelar" onclick="botaoCancelarTitulo()" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>

    <script type="text/javascript" src="../scripts/CadastroTitulo.js"></script>
</body>

</html>