<?php

namespace greenbook\view;

require_once __DIR__ . '\..\controller\MainController.php';
require_once __DIR__ . '\..\..\vendor\autoload.php';

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Tarefa;
use greenbook\model\TipoDeTarefa;
use greenbook\model\Recompensa;
use greenbook\model\Usuario;
use greenbook\model\Publicacao;
use greenbook\model\TarefaUsuario;
use greenbook\model\Titulo;
use greenbook\repository\UsuarioRepository;
use greenbook\repository\RecompensaRepository;
use greenbook\repository\TipoDeTarefaRepository;
use greenbook\repository\TarefaRepository;
use greenbook\repository\PublicacaoRepository;
use greenbook\repository\TarefaUsuarioRepository;
use greenbook\repository\TituloRepository;

require_once("header.php");
?>
<!DOCTYPE html>
<html>

<?php
include("header.php");
include("navbar.php");

$_idUsuario = @$_SESSION["id_usuario"];

$factory = new EntityManagerFactory();
$entityManager = $factory->getEntityManager();

$tipoRepository = $entityManager->getRepository(TipoDeTarefa::class);
$tipoRepository = tipoRepositoryClass($tipoRepository);
$tiposTarefas = $tipoRepository->findAll();

$tarefaRepository = $entityManager->getRepository(Tarefa::class);
$tarefaRepository = tarefaRepositoryClass($tarefaRepository);
$tarefas = $tarefaRepository->findAll();

$tarefaUsuarioRepository = $entityManager->getRepository(TarefaUsuario::class);
$tarefaUsuarioRepository = tarefaUsuarioRepositoryClass($tarefaUsuarioRepository);
$tarefasUsuario = $tarefaUsuarioRepository->findAll();


$recompensaRepository = $entityManager->getRepository(Recompensa::class);
$recompensaRepository = recompensaRepositoryClass($recompensaRepository);
$recompensas = $recompensaRepository->findAll();

$usuarioRepository = $entityManager->getRepository(Usuario::class);
$usuarioRepository = usuarioRepositoryClass($usuarioRepository);
$usuarios = $usuarioRepository->findAll();

$publicacaoRepository = $entityManager->getRepository(Publicacao::class);
$publicacaoRepository = publicacaoRepositoryClass($publicacaoRepository);
$publicacoes = $publicacaoRepository->findAll();

$tituloRepository = $entityManager->getRepository(Titulo::class);
$tituloRepository = tituloRepositoryClass($tituloRepository);
$titulos = $tituloRepository->findAll();

$usuarioRepository = $entityManager->getRepository(Usuario::class);
$usuarioRepository = usuarioRepositoryClass($usuarioRepository);
$usuario = $usuarioRepository->findById($_idUsuario);

$qb = $entityManager->createQueryBuilder();
$qb->select(array('u'))
   ->from('greenbook\model\Usuario','u')
   ->orderBy('u.pontuacaoGeral', 'DESC');


$ranking = $qb->getQuery()->execute();

function tarefaRepositoryClass($myClass): TarefaRepository
{
    return $myClass;
}

function tarefaUsuarioRepositoryClass($myClass): TarefaUsuarioRepository
{
    return $myClass;
}

function tipoRepositoryClass($myClass): TipoDeTarefaRepository
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
function publicacaoRepositoryClass($myClass): PublicacaoRepository
{
    return $myClass;
}

function tituloRepositoryClass($myClass): TituloRepository
{
    return $myClass;
}


$fotoPost = null;

?>

<body>
    <div class="container container-fluid p-3 my-3 border">
        <div class="row">
            <h2>Bem-vinda(o)!</h2>
            <div class="col-lg-5">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home">Tarefas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu1">Tarefas concluídas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu2">Loja</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu3">Ranking</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="home" class="container tab-pane active"><br>
                        <?php
                        foreach ($tarefas as $linha) {
                            $tarefaRealizada= 0;
                            foreach ($tarefasUsuario as $linha2){
                                if($linha->getId()!=$linha2->getTarefa()->getId()){
                                    continue;
                                }
                                if ($linha2->getUsuario()->getId() != $_idUsuario) {
                                    continue;
                                }
                                if (!$linha2->isConcluida()) {
                                    continue;
                                }
                                $tarefaRealizada = 1;
                                break;
                            }
                            if($tarefaRealizada==1){
                                continue;
                            }

                            echo '<div class="container-fluid p-3 my-3 border tarefa">';
                            echo '<div class="row">';
                            echo '<div class="col-md-4"><h6>Tipo: ' . $linha->getTipoDeTarefa()->getNome() . '</h6></div>';
                            echo '<div class="col-md-4"><h6>Moedas: ' . $linha->getValorEmMoedas() . '</h6></div>';
                            echo '<div class="col-md-4"><h6>Pontos: ' . $linha->getValorEmPontos() . '</h6></div>';
                            echo '</div>';
                            echo '<h6 class="tarefaTexto">' . $linha->getDescricao() . '</h6>';
                            echo '<div class="row">';
                            echo '<div class="col-md-12" style=""><button class="btn btn-success" onclick="concluirTarefa(' . $linha->getId() . ',' . $_idUsuario . ')"> <i class="fas fa-check"></i> &nbsp; Concluir tarefa</button></div>';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <div id="menu1" class="container tab-pane fade"><br>
                        <?php
                        foreach ($tarefasUsuario as $linha) {
                            if ($linha->getUsuario()->getId() != $_idUsuario) {
                                continue;
                            }
                            if (!$linha->isConcluida()) {
                                continue;
                            }
                            echo '<div class="container-fluid p-3 my-3 border tarefa">';
                            echo '<div class="row">';
                            echo '<div class="col-md-4"><h6>Tipo: ' . $linha->getTarefa()->getTipoDeTarefa()->getNome() . '</h6></div>';
                            echo '<div class="col-md-4"><h6>Moedas: ' . $linha->getTarefa()->getValorEmMoedas() . '</h6></div>';
                            echo '<div class="col-md-4"><h6>Pontos: ' . $linha->getTarefa()->getValorEmPontos() . '</h6></div>';
                            echo '</div>';
                            echo '<h6 class="tarefaTexto">' . $linha->getTarefa()->getDescricao() . '</h6>';
                            echo '</div>';
                        }
                        ?></div>
                    <div id="menu2" class="container tab-pane fade"><br>
                        <?php
                        echo '<h2>Saldo: ' . $usuario->getMoedas() . '</h2>';
                        foreach ($titulos as $linha) {

                            $encontrou = 0;
                            foreach ($usuario->getTitulos() as $userTitulo) {
                                if ($userTitulo->getId() == $linha->getId()) {
                                    $encontrou = 1;
                                    break;
                                }
                            }
                            if ($encontrou == 1) {
                                continue;
                            }

                            echo '<div class="container-fluid p-3 my-3 border loja">';
                            echo '<div class="row">';
                            echo '<div class="col-md-6" style="word-wrap:break-word;">' . $linha->getNome() . '</div>';
                            //echo '<div class="col-md-5">Imagem</div>';
                            echo '<div class="col-md-6" style="height: 100%">';
                            echo '<div class="loja-valor">Valor: ' . $linha->getValor() . '</div>';
                            echo '<div class="loja-comprar"><input id="loja-botao-comprar" class="loja-botao-comprar" type="submit" onclick="compraLoja(' . $linha->getId() . ',' . $linha->getValor() . ',' . $usuario->getMoedas() . ',' . $usuario->getId() . ')" name="clickedL" value="Comprar"/></div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>

                    </div>
                    <div id="menu3" class="container tab-pane fade"><br>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Pontos</th>
                                    <th scope="col">Nome</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($ranking as $linha) {
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
            <div class="col-lg-7">
                <div class="row">
                    <div class="col-lg-9">
                        <h5>Posts da comunidade</h5>
                    </div>
                    <div class="col-lg-3">
                        <button type="button" id="openPostModal" class="btn btn-success" style="float: right; margin-bottom: 2px;" data-toggle="modal" data-target="#exampleModalCenter">Criar Post</button>
                    </div>

                </div>
                <div class="container-fluid border">
                    <?php

                    function findUserById($id, $usuarios){
                
                    foreach ( $usuarios as $element ) {
                        if ( $id == $element->getNome() ) {
                            return $element;
                        }
                    }
                
                    return null;
                }
                    foreach ($publicacoes as $post) {
                      

                        echo '<div class="container-fluid p-3 my-3 border post">';
                        echo '<div class="row">';
                        
                        if(!is_null($post->getUsuario()) && $post->getUsuario() != ""){
                            echo '<div class="col-md-12" style="word-wrap:break-word;font-size: 14px;">Usuário ' . $post->getUsuario()->getNome() . ' postou:</div>';
                        }else{
                            echo '<div class="col-md-12" style="word-wrap:break-word;font-size: 14px;">Empresa ' . $post->getEmpresa()->getNomeFantasia() . 'postou:</div>';
                        }
                      
                        echo '</div>';
                        echo '<div class="row">';
                        echo '<div class="col-md-12" style="word-wrap:break-word;"><h4>' . $post->getTexto() . '</h4></div>';
                     
                        echo '<div class="col-md-12" style="word-wrap:break-word;">' . $post->getDescricao() . '</div>';
                        if ($post->getImagem() != "") {
                            echo '<div class="col-md-12" style="height: 100%">';
                            echo '<img style="width: 200px;height:200px;object-fit: scale-down;" src="' . $post->getImagem() . '" />';
                            echo '</div>';
                        }
                        echo '</div>';
                        
                        echo '<div class="row" style="margin-top:10px">';
                        echo '<div class="col-md-1" style=""><button class="btn btn-success"><i class="fas fa-thumbs-up"></i></button></div>';
                        echo '<div class="col-md-1" style=""><button class="btn btn-success"><i class="fas fa-thumbs-down"></i></button></div>';
                        echo '<div class="col-md-8" style=""><input type="text" placeholder="Deixe seu comentário..." class="form-control"></div>';
                        echo '<div class="col-md-2" style=""><button class="btn btn-success">Enviar</button></div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Criar post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none; background-color: transparent;">
                        <i aria-hidden="true" class="fas fa-times"></i>
                    </button>
                </div>
                <form id="formPost" action="" method="POST">
                    <div class="modal-body">
                        <input type="hidden" id="idUsuario" name="idUsuario" value="<?= is_null($_empresa) || $_empresa == "" ? $_idUsuario : "" ?>">
                        <input type="hidden" id="idEmpresa" name="idEmpresa" value="<?= is_null($_empresa) || $_empresa == "" ? "" : $_idUsuario ?>">
                        <input type="hidden" id="idTarefa" name="idTarefa" value="">
                        <div class="form-row row">
                            <div class="form-group">
                                <label for="txtTitulo">Título</label>
                                <input type="text" class="form-control" id="txtTitulo" name="txtTitulo" value="">
                            </div>
                        </div>
                        <br>
                        <div class="form-row row">
                            <div class="form-group">
                                <label for="txtDescricao">Descrição</label>
                                <textarea class="form-control" id="txtDescricao" name="txtDescricao" style="max-height: 400px;"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-row row">
                            <div class="form-group">
                                <label for="txtNome">Selecionar imagem</label>
                                <input type="file" id="uploadImagem" name="uploadImagem" style="display: none;" accept="image/png, image/jpeg" />
                                <div class="row">
                                    <div class="col-md-4">
                                        <img id="imgFotoPost" name="imgFotoPost" class="preview-foto-post" src="<?= is_null($fotoPost) ? "../../img/no-image.jpg" : $fotoPost ?>">
                                    </div>
                                    <div class="col-md-8" style="display: flex; align-items: center;">
                                        <a id="btnAddImagem" class="btn btn-primary icon-button " title="Enviar imagem">
                                            <i id="addImageIcon" class="fas fa-plus"></i>
                                            <label>Imagem</label>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" id="addPost" class="btn btn-primary">Postar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="../scripts/Postagens.js"></script>

</html>