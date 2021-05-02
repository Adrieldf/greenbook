<?php
//
//namespace greenbook\testes\integracao;
//
//use greenbook\helper\EntityManagerFactory;
//use greenbook\model\TarefaUsuario;
//use greenbook\model\Usuario;
//use greenbook\model\Tarefa;
//use greenbook\repository\TarefaRepository;
//use greenbook\repository\UsuarioRepository;
//
//require_once __DIR__ . '/../../../vendor/autoload.php';
//
//$factory = new EntityManagerFactory();
//$entityManager = $factory->getEntityManager();
//
//$usuarioRepository = $entityManager->getRepository(Usuario::class);
//$tarefaRepository = $entityManager->getRepository(Tarefa::class);
//
//$usuarioRepository = usuarioRepositoryClass($usuarioRepository);
//$tarefaRepository = tarefaRepositoryClass($tarefaRepository);
//
////_________________________Teste addtarefa:
//
//$usuarioId = 104;
//$tarefaId = 1;
//
//$usuario = $usuarioRepository->findById($usuarioId);//pega um usuario do banco
//$tarefa = $tarefaRepository->findById($tarefaId);//pega uma tarefa do banco
//
//$tarefaUsuario = new TarefaUsuario($tarefa, $usuario);//cria uma tarefa
//$usuario->addTarefa($tarefaUsuario);
//$usuario->getTarefas()->count();
//$usuarioRepository->save($usuario);
//
//$result = $usuarioRepository->findById($usuarioId);
//
//if($result->getTarefas()->count() == $usuario->getTarefas()->count()){
//    echo "Teste de adicionar tarefa = Sucesso";
//} else
//    echo "Teste de adicionar tarefa = Falho";
//echo "<br>";
//
////_________________________Teste concluir essa tarefa:
//
//$result->getTarefas()->last()->concluir();
//$usuarioRepository->save($result);
//$result = $usuarioRepository->findById($usuarioId);
//
//if($result->getTarefas()->last()->isConcluida()){
//    echo "Teste de concluir tarefa = Sucesso";
//} else
//    echo "Teste de concluir tarefa = Falho";
//echo "<br>";
//
//
//
////_____________________Fim dos testes
//
//function usuarioRepositoryClass($myClass): UsuarioRepository
//{
//    return $myClass;
//}
//
//function tarefaRepositoryClass($myClass): TarefaRepository
//{
//    return $myClass;
//}