<?php

namespace greenbook\repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\TransactionRequiredException;
use greenbook\model\Recompensa;

require_once __DIR__ . '/../../vendor/autoload.php';
class RecompensaRepository extends EntityRepository
{
    function findById(int $id): ?Recompensa
    {
        $entityManager = $this->getEntityManager();
        try {
            return $entityManager->find(Recompensa::class, $id);
        } catch (OptimisticLockException | TransactionRequiredException | ORMException $e) {
            return null;
        }
    }

    function save(Recompensa $recompensa): ?Recompensa
    {
        $entityManager = $this->getEntityManager();
        try {
            $entityManager->persist($recompensa);
            $entityManager->flush();
        } catch (OptimisticLockException | ORMException $e) {
            return null;
        }
        return $recompensa;
    }

    function delete(int $id): void
    {
        $entityManager = $this->getEntityManager();
        $objeto = $entityManager->getReference(Recompensa::class, $id);

        try {
            $entityManager->remove($objeto);
            $entityManager->flush();
        } catch (OptimisticLockException | ORMException $e) {}
    }
}