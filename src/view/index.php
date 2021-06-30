<?php

namespace greenbook\view;

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Usuario;
use greenbook\repository\UsuarioRepository;
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

$qb = $entityManager->createQueryBuilder();
$qb->select(array('u'))
   ->from('greenbook\model\Usuario','u')
   ->orderBy('u.pontuacaoGeral', 'DESC');

$usuarios = $qb->getQuery()->getArrayResult();

/*
$usuarioRepository = $entityManager->getRepository(Usuario::class);
$usuarioRepository = usuarioRepositoryClass($usuarioRepository);
$usuarios = $usuarioRepository->findAll();*/

function usuarioRepositoryClass($myClass): UsuarioRepository
{
    return $myClass;
}

?>

<body>

    <div class="container-fluid p-3 my-3 border">
        <div class="row">
            <div class="col-lg-6">
                <img height="300" width="300" src="../../img/green-tree-logo.jpg" alt="Arvore">
            </div>
            <div class="col-lg-6">
                <h2>Grenbook</h2>
                <h6>Quem somos?</h6>
                <p>teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste
                    teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste
                    teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste
                    teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste
                    teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste
                    teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste
                </p>
                <div>
                    <button class="btn btn-outline-success navbar-button home-button-fazer-parte">Fazer parte</button>
                </div>
            </div>

        </div>

    </div>

    <div class="container-fluid p-3 my-3 bg-green">
        <div class="row">
            <div class="col-md-4">
                <div class="container p-3 my-3 home-container-ranking">
                    <h2 class="home-text-ranking">Ranking</h2>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Pontos</th>
                                <th scope="col">Nome</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $contador = 1;
                            echo $usuarios;
                            /*foreach ($usuarios as $linha) {
                                echo '<tr>';
                                echo '<th>' . $usuarios . '</th>';
                                //echo '<th>' . $linha->getNome() . '</th>';
                                echo '</tr>';
                                $contador = $contador + 1;
                                if($contador == 10){
                                    break;
                                }
                            }*/
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-8 home-companies">
                <h5>Empresas apoiadoras</h5>
                <div class="container-fluid p-3 my-3 border">
                    <div class="row">
                        <div class="col-md-4">
                            <p>imagem da empresa 1</p>
                        </div>
                        <div class="col-md-8">texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                        </div>
                    </div>
                </div>
                <div class="container-fluid p-3 my-3 border">
                    <div class="row">
                        <div class="col-md-4">
                            <p>imagem da empresa 2</p>
                        </div>
                        <div class="col-md-8">texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                        </div>
                    </div>
                </div>
                <div class="container-fluid p-3 my-3 border">
                    <div class="row">
                        <div class="col-md-4">
                            <p>imagem da empresa 3</p>
                        </div>
                        <div class="col-md-8">texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto texto texto texto texto texto
                            texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</body>

</html>