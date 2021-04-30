<?php

namespace greenbook\repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\TransactionRequiredException;
use greenbook\model\Titulo;

require_once __DIR__ . '/../../vendor/autoload.php';
class TituloRepository  extends EntityRepository
{
    function findById(int $id): ?Titulo
    {
        $entityManager = $this->getEntityManager();
        try {
            return $entityManager->find(Titulo::class, $id);
        } catch (OptimisticLockException | TransactionRequiredException | ORMException $e) {
            return null;
        }
    }

    function save(Titulo $titulo): ?Titulo
    {
        $entityManager = $this->getEntityManager();
        try {
            $entityManager->persist($titulo);
            $entityManager->flush();
        } catch (OptimisticLockException | ORMException $e) {
            return null;
        }
        return $titulo;
    }

    function delete(int $id): void
    {
        $entityManager = $this->getEntityManager();
        $objeto = $entityManager->getReference(Titulo::class, $id);

        try {
            $entityManager->remove($objeto);
            $entityManager->flush();
        } catch (OptimisticLockException | ORMException $e) {}
    }
}
{

}