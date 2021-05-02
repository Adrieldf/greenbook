<?php
//
//namespace greenbook\testes\integracao;
//
//use greenbook\helper\EntityManagerFactory;
//use greenbook\model\Recompensa;
//use greenbook\repository\RecompensaRepository;
//
//require_once __DIR__ . '/../../../vendor/autoload.php';
//
//$factory = new EntityManagerFactory();
//$repository = $factory->getEntityManager()->getRepository(Recompensa::class);
//$repository = repositoryClass($repository);
//
////____________________Teste de Insert:
//
//$recompensa = new Recompensa("reco", 500, true);
//
//$result =  $repository->save($recompensa);
//
//if($result->getId() > 0){
//    echo "Teste de recompensa insert = Sucesso";
//} else
//    echo "Teste de recompensa insert = Falho";
//
//echo "<br>";
//
////_________________________Teste de Find:
//
//$id = $result->getId();
//
//$recompensa = $repository->findById($id);
//
//if($recompensa ->getId() == $id){
//    echo "Teste de recompensa findById = Sucesso";
//} else
//    echo "Teste de recompensa findById = Falho";
//
//echo "<br>";
//
////______________________Teste de Update:
//
//$recompensa->setDescricao("d");
//$repository->save($recompensa);
//
//if($recompensa ->getDescricao() == "d"){
//    echo "Teste de recompensa update = Sucesso";
//} else
//    echo "Teste de recompensa update = Falho";
//
//echo "<br>";
//
//$recompensa->setDescricao("reco");
//$repository->save($recompensa);
//
////_____________________Fim dos testes
//
//function repositoryClass($myClass): RecompensaRepository
//{
//    return $myClass;
//}
