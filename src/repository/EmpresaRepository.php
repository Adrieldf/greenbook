<?php

namespace greenbook\repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\TransactionRequiredException;
use greenbook\model\Empresa;
use greenbook\model\Usuario;

require_once __DIR__ . '/../../vendor/autoload.php';

class EmpresaRepository extends EntityRepository
{
    function findById(int $id): ?Empresa
    {
        $entityManager = $this->getEntityManager();
        try {
            return $entityManager->find(Empresa::class, $id);
        } catch (OptimisticLockException | TransactionRequiredException | ORMException $e) {
            return null;
        }
    }

    function save(Empresa $empresa): Empresa
    {
        $entityManager = $this->getEntityManager();

        $entityManager->persist($empresa);
        $entityManager->flush();
        return $empresa;
    }

    function delete(int $id): void
    {
        $entityManager = $this->getEntityManager();

        $objeto = $entityManager->getReference(Empresa::class, $id);
        $entityManager->remove($objeto);
        $entityManager->flush();
    }
}