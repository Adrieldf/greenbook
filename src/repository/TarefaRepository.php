<?php

namespace greenbook\repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\TransactionRequiredException;
use greenbook\model\Tarefa;

require_once __DIR__ . '/../../vendor/autoload.php';

class TarefaRepository extends EntityRepository
{
    function findById(int $id): ?Tarefa
    {
        $entityManager = $this->getEntityManager();
        try {
            return $entityManager->find(Tarefa::class, $id);
        } catch (OptimisticLockException | TransactionRequiredException | ORMException $e) {
            return null;
        }
    }

    function save(Tarefa $tarefa): ?Tarefa
    {
        $entityManager = $this->getEntityManager();
        try {
            $entityManager->persist($tarefa);
            $entityManager->flush();
        } catch (OptimisticLockException | ORMException $e) {
            return null;
        }
        return $tarefa;
    }

    function delete(int $id): void
    {
        $entityManager = $this->getEntityManager();
        $objeto = $entityManager->getReference(Tarefa::class, $id);

        try {
            $entityManager->remove($objeto);
            $entityManager->flush();
        } catch (OptimisticLockException | ORMException $e) {}
    }

    //não testado
//    function findOneByDescricao(string $descricao): Tarefa
//    {
//        $qb = $this->getEntityManager()->createQueryBuilder();
//
//        return $qb->select('tarefa')
//            ->from('Tarefa', 'tarefa')
//            ->where('tarefa = t1')
//            ->getQuery()
//            ->setParameter("t1", $descricao)
//            ->getResult();
//    }
}
