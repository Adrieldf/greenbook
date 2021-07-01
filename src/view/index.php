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
    ->from('greenbook\model\Usuario', 'u')
    ->orderBy('u.pontuacaoGeral', 'DESC');


$usuarios = $qb->getQuery()->execute();


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
            <div class="col-lg-6" style="display: flex; justify-content: center;">
                <img height="300" width="300" src="../../img/green-tree-logo.jpg" alt="Arvore">
            </div>
            <div class="col-lg-6">
                <h2>Grenbook</h2>
                <h6>Quem somos?</h6>
                <p>Criada a partir de um trabalho de faculdade, o Greenbok nasceu com o objetivo de unir
                    pessoas e divulgar ações sustentáveis. O site permite com que pessoas e empresas possam
                    compartilhar suas experiências e disponibiliza prêmios com o intuito de fazer com que seus
                    usuários ganhem um incentivo a continuarem com seus trabalhos</p>
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
                            //echo $usuarios;
                            foreach ($usuarios as $linha) {
                                echo '<tr>';
                                echo '<th>' . $linha->getPontuacaoGeral() . '</th>';
                                echo '<th>' . $linha->getNome() . '</th>';
                                echo '</tr>';
                                $contador = $contador + 1;
                                if ($contador == 10) {
                                    break;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-8 home-companies">
                <h5>Empresas apoiadoras</h5>
                <div class="container-fluid p-3 my-3 border">
                    <div class="row">
                        <div class="col-md-3">
                            <img height="120" width="200" src="../../img/engie" alt="Arvore">
                        </div>
                        <div class="col-md-9">A Engie Brasil Energia, anteriormente Tractebel Energia, é uma das maiores geradoras privadas de energia do Brasil. Com 55 usinas geradoras, a Engie tem capacidade instalada de 8.276 MW. Isso representa cerca de 6% da capacidade do País, com 90% da energia provenientes de fontes renováveis. A companhia também atua nos segmentos de comercialização e transmissão de energia.</div>
                    </div>
                </div>
                <div class="container-fluid p-3 my-3 border">
                    <div class="row">
                        <div class="col-md-3">
                            <img height="120" width="200" src="../../img/fleury" alt="Arvore">
                        </div>
                        <div class="col-md-9">O Grupo Fleury é uma das maiores e mais tradicionais empresas de medicina diagnóstica do País. Realiza anualmente cerca de 70 milhões de exames e análises clínicas e 5 milhões de exames de imagem. Inaugurada em 1926, parte do crescimento da empresa foi por intermédio de aquisições de marcas do setor, como forma de complementar o mix de serviços e expandir a área de cobertura de atendimento.</div>
                    </div>
                </div>
                <div class="container-fluid p-3 my-3 border">
                    <div class="row">
                        <div class="col-md-3">
                            <img height="120" width="200" src="../../img/cosan" alt="Arvore">
                        </div>
                        <div class="col-md-9">O grupo Cosan atua nos setores de agronegócio, distribuição de combustíveis e de gás natural e de lubrificantes e logística, com empresas como Raízen, Comgas, Moove e Rumo e marcas como Shell. Com origem no setor sucroenergético, ao longo de sua trajetória, iniciada em 1936, a companhia diversificou seu portfólio de negócios.</div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</body>

</html>