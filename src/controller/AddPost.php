<?php

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Empresa;
use greenbook\model\Publicacao;
use greenbook\model\TarefaUsuario;
use greenbook\repository\TarefaUsuarioRepository;
use greenbook\model\Tarefa;
use greenbook\repository\TarefaRepository;
use greenbook\repository\PublicacaoRepository;
use greenbook\model\Usuario;
use greenbook\repository\EmpresaRepository;
use greenbook\repository\UsuarioRepository;

require_once __DIR__ . '/../../vendor/autoload.php';

$idUsuario = @$_POST["idUsuario"];
$idEmpresa = @$_POST["idEmpresa"];
$titulo = @$_POST["txtTitulo"];
$descricao = @$_POST["txtDescricao"];
$imagem = @$_POST["imgFotoPost"];
$idTarefa = @$_POST["idTarefa"];

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
$repository = $entityManager->getRepository(Publicacao::class);
$repository = repositoryClass($repository);

$publicacao = new Publicacao($titulo);
$publicacao->setDescricao($descricao);

if(!is_null($imagem) && $imagem != "")
    $publicacao->setImagem($imagem);



if(!$idEmpresa == ""){
    $empresaRepository = $entityManager->getRepository(Empresa::class);
    $empresaRepository = empresaRepositoryClass($empresaRepository);
    $empresa = $empresaRepository->findById($idEmpresa);
    $publicacao->setEmpresa($empresa);
}else{
    $userRepository = $entityManager->getRepository(Usuario::class);
    $userRepository = usuarioRepositoryClass($userRepository);
    $usuario = $userRepository->findById($idUsuario);
    $publicacao->setUsuario($usuario);

    if(!is_null($idTarefa) && $idTarefa != ""){
        $repositoryTarefa = $entityManager->getRepository(Tarefa::class);
        $repositoryTarefa = tarefaRepositoryClass($repositoryTarefa);
        $repositoryTarefaUsuario = $entityManager->getRepository(TarefaUsuario::class);
        $repositoryTarefaUsuario = tarefaUsuarioRepositoryClass($repositoryTarefaUsuario);
        
        $tarefa = $repositoryTarefa->findById($idTarefa);
        $tarefaUsuario = new TarefaUsuario($tarefa, $usuario);
        $tarefaUsuario->setConcluida(true);

        $repositoryTarefaUsuario->save($tarefaUsuario);

        $publicacao->setTarefa($tarefaUsuario);
    }
}

try {
    $repository->save($publicacao);
    
}catch (Exception $e){
   echo($e);

}

function repositoryClass($myClass): PublicacaoRepository
{
    return $myClass;
}
function usuarioRepositoryClass($myClass): UsuarioRepository
{
    return $myClass;
}
function empresaRepositoryClass($myClass): EmpresaRepository
{
    return $myClass;
}
function tarefaUsuarioRepositoryClass($myClass): TarefaUsuarioRepository
{
    return $myClass;
}
function tarefaRepositoryClass($myClass): TarefaRepository
{
    return $myClass;
}

echo "../view/postagens.php";

exit;
