<?php

namespace greenbook\testes\integracao;

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Comentario;
use greenbook\model\Imagem;
use greenbook\model\Publicacao;
use greenbook\model\Reacao;
use greenbook\model\Usuario;
use greenbook\repository\PublicacaoRepository;
use greenbook\repository\UsuarioRepository;

require_once __DIR__ . '/../../../vendor/autoload.php';

$factory = new EntityManagerFactory();
$entityManager = $factory->getEntityManager();

$usuarioRepository = $entityManager->getRepository(Usuario::class);
$publicacaoRepository = $entityManager->getRepository(Publicacao::class);

$usuarioRepository = usuarioRepositoryClass($usuarioRepository);
$publicacaoRepository = publicacaoRepositoryClass($publicacaoRepository);

//_________________________Teste add:

$idpub = 5;
$idUsu = 31;

$publicacao = $publicacaoRepository->findById($idpub);//pega uma publicacao do banco
$usuario = $usuarioRepository->findById($idUsu);//pega um usuario do banco

$comentario = new Comentario("coment", $usuario, $publicacao);//cria um comentario
$imagem = new Imagem("http", 100, $publicacao);
$reacao = new Reacao("like", $usuario);

$publicacao->addComentario($comentario);
$publicacao->addImagem($imagem);
$publicacao->addReacao($reacao);

echo $publicacao->getComentarios()->count();
echo "<br>";
echo $publicacao->getImagens()->count();
echo "<br>";
echo $publicacao->getReacao()->count();

$publicacaoRepository->save($publicacao);

//_____________________Fim dos testes

function publicacaoRepositoryClass($myClass): PublicacaoRepository
{
    return $myClass;
}

function usuarioRepositoryClass($myClass): UsuarioRepository
{
    return $myClass;
}