<?php
//
//namespace greenbook\testes\integracao;
//
//use greenbook\helper\EntityManagerFactory;
//use greenbook\model\Empresa;
//use greenbook\repository\EmpresaRepository;
//
//require_once __DIR__ . '/../../../vendor/autoload.php';
//
//$factory = new EntityManagerFactory();
//$repository = $factory->getEntityManager()->getRepository(Empresa::class);
//$repository = repositoryClass($repository);
//
////____________________Teste de Insert:
//
//$empresa = new Empresa("a@a.com", "senha", "rs");
//
//$result =  $repository->save($empresa);
//
//if($result->getId() > 0){
//    echo "Teste de empresa insert = Sucesso";
//} else
//    echo "Teste de empresa insert = Falho";
//
//echo "<br>";
//
////_________________________Teste de Find:
//
//$id = $result->getId();
//
//$empresa = $repository->findById($id);
//
//if($empresa ->getId() == $id){
//    echo "Teste de empresa findById = Sucesso";
//} else
//    echo "Teste de empresa findById = Falho";
//
//echo "<br>";
//
////______________________Teste de Email:
//
//$empresa->setEmail("teste@teste.com");
//$repository->save($empresa);
//
//if($empresa ->getEmail() == "teste@teste.com"){
//    echo "Teste de empresa update = Sucesso";
//} else
//    echo "Teste de empresa update = Falho";
//
//echo "<br>";
//
//$empresa->setEmail("a@a.com");
//$repository->save($empresa);
//
////_____________________Fim dos testes
//
//function repositoryClass($myClass): EmpresaRepository
//{
//    return $myClass;
//}

