<?php

namespace greenbook\repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\TransactionRequiredException;
use greenbook\model\TipoDeTarefa;

require_once __DIR__ . '/../../vendor/autoload.php';

class TipoDeTarefaRepository extends EntityRepository
{
    function findById(int $id): ?TipoDeTarefa
    {
        $entityManager = $this->getEntityManager();
        try {
            return $entityManager->find(TipoDeTarefa::class, $id);
        } catch (OptimisticLockException | TransactionRequiredException | ORMException $e) {
            return null;
        }
    }

    function findByNome(string $nome): ?TipoDeTarefa
    {
        $entityManager = $this->getEntityManager();
        return $entityManager->getRepository(TipoDeTarefa::class)->findOneBy(array('nome'=>$nome));
    }

    function save(TipoDeTarefa $tipoDeTarefa): ?TipoDeTarefa
    {
        $entityManager = $this->getEntityManager();
        try {
            $entityManager->persist($tipoDeTarefa);
            $entityManager->flush();
        } catch (OptimisticLockException | ORMException $e) {
            return null;
        }
        return $tipoDeTarefa;
    }

    function delete(int $id): void
    {
        $entityManager = $this->getEntityManager();
        $objeto = $entityManager->getReference(TipoDeTarefa::class, $id);

        try {
            $entityManager->remove($objeto);
            $entityManager->flush();
        } catch (OptimisticLockException | ORMException $e) {}
    }
}