<?php

namespace greenbook\view;

require_once __DIR__ . '\..\controller\MainController.php';
require_once __DIR__ . '\..\..\vendor\autoload.php';

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Tarefa;
use greenbook\model\TipoDeTarefa;
use greenbook\model\Titulo;
use greenbook\model\Recompensa;
use greenbook\model\Usuario;
use greenbook\repository\UsuarioRepository;
use greenbook\repository\RecompensaRepository;
use greenbook\repository\TituloRepository;
use greenbook\repository\TipoDeTarefaRepository;
use greenbook\repository\TarefaRepository;

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

$tituloRepository = $entityManager->getRepository(Titulo::class);
$tituloRepository = tituloRepositoryClass($tituloRepository);

$titulos = $tituloRepository->findAll();

$recompensaRepository = $entityManager->getRepository(Recompensa::class);
$recompensaRepository = recompensaRepositoryClass($recompensaRepository);

$recompensas = $recompensaRepository->findAll();

$usuarioRepository = $entityManager->getRepository(Usuario::class);
$usuarioRepository = usuarioRepositoryClass($usuarioRepository);

$usuarios = $usuarioRepository->findAll();

function tarefaRepositoryClass($myClass): TarefaRepository
{
    return $myClass;
}
function tipoRepositoryClass($myClass): TipoDeTarefaRepository
{
    return $myClass;
}

function tituloRepositoryClass($myClass): TituloRepository
{
    return $myClass;
}

function recompensaRepositoryClass($myClass): RecompensaRepository
{
    return $myClass;
}

function usuarioRepositoryClass($myClass): UsuarioRepository
{
    return $myClass;
}

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
                        <a class="nav-link" data-toggle="tab" href="#menu1">Tarefas não con.</a>
                    </li>
                    <li class="nav-item usuario-tab">
                        <a class="nav-link" data-toggle="tab" href="#menu2">Títulos</a>
                    </li>
                    <li class="nav-item usuario-tab">
                        <a class="nav-link" data-toggle="tab" href="#menu3">Loja</a>
                    </li>
                    <li class="nav-item usuario-tab">
                        <a class="nav-link" data-toggle="tab" href="#menu4">Ranking</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="home" class="container tab-pane active"><br>
                        <?php
                        foreach ($tarefas as $linha) {
                            echo '<div class="container-fluid p-3 my-3 border tarefa">';
                            echo '<div class="row">';
                            echo '<div class="col-md-4"><h6>Tipo: ' . $linha->getTipoDeTarefa()->getNome() . '</h6></div>';
                            echo '<div class="col-md-4"><h6>Moedas: ' . $linha->getValorEmMoedas() . '</h6></div>';
                            echo '<div class="col-md-4"><h6>Pontos: ' . $linha->getValorEmPontos() . '</h6></div>';
                            echo '</div>';
                            echo '<h6 class="tarefaTexto">' . $linha->getDescricao() . '</h6>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <div id="menu1" class="container tab-pane fade"><br>
                        <?php
                        foreach ($tarefas as $linha) {
                            echo '<div class="container-fluid p-3 my-3 border tarefa">';
                            echo '<div class="row">';
                            echo '<div class="col-md-4"><h6>Tipo: ' . $linha->getTipoDeTarefa()->getNome() . '</h6></div>';
                            echo '<div class="col-md-4"><h6>Moedas: ' . $linha->getValorEmMoedas() . '</h6></div>';
                            echo '<div class="col-md-4"><h6>Pontos: ' . $linha->getValorEmPontos() . '</h6></div>';
                            echo '</div>';
                            echo '<h6 class="tarefaTexto">' . $linha->getDescricao() . '</h6>';
                            echo '</div>';
                        }
                        ?></div>
                    <div id="menu2" class="container tab-pane fade"><br>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="titulo-col1" scope="col">Valor</th>
                                    <th class="titulo-col2" scope="col">Nome</th>
                                    <th class="titulo-col3" scope="col">Descrição</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($titulos as $linha) {
                                    echo '<tr>';
                                    echo '<th class="titulo-col1">' . $linha->getValor() . '</th>';
                                    echo '<th class="titulo-col2">' . $linha->getNome() . '</th>';
                                    echo '<th class="titulo-col3">' . $linha->getDescricao() . '</th>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div id="menu3" class="container tab-pane fade"><br>
                        <?php

                        foreach ($recompensas as $linha) {
                            echo '<div class="container-fluid p-3 my-3 border loja">';
                            echo '<div class="row">';
                            echo '<div class="col-md-4" style="word-wrap:break-word;">' . $linha->getDescricao() . '</div>';
                            echo '<div class="col-md-5">Imagem</div>';
                            echo '<div class="col-md-3" style="height: 100%">';
                            echo '<div class="loja-valor">Valor: ' . $linha->getValor() . '</div>';
                            echo '<div class="loja-comprar"><input class="loja-botao-comprar" type="submit" name="clicked" value="Comprar"/></div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <div id="menu4" class="container tab-pane fade"><br>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Pontos</th>
                                    <th scope="col">Nome</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($usuarios as $linha) {
                                    echo '<tr>';
                                    echo '<th>' . $linha->getPontuacaoGeral() . '</th>';
                                    echo '<th>' . $linha->getNome() . '</th>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
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