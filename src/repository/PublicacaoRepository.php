<?php

namespace greenbook\repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\TransactionRequiredException;
use greenbook\model\Publicacao;

require_once __DIR__ . '/../../vendor/autoload.php';

class PublicacaoRepository extends EntityRepository
{
    function findById(int $id): ?Publicacao
    {
        $entityManager = $this->getEntityManager();
        try {
            return $entityManager->find(Publicacao::class, $id);
        } catch (OptimisticLockException | TransactionRequiredException | ORMException $e) {
            return null;
        }
    }

    function save(Publicacao $publicacao): ?Publicacao
    {
        $entityManager = $this->getEntityManager();
        try {
            $entityManager->persist($publicacao);
            $entityManager->flush();
        } catch (OptimisticLockException | ORMException $e) {
            return null;
        }
        return $publicacao;
    }

    function delete(int $id): void
    {
        $entityManager = $this->getEntityManager();
        $objeto = $entityManager->getReference(Publicacao::class, $id);

        try {
            $entityManager->remove($objeto);
            $entityManager->flush();
        } catch (OptimisticLockException | ORMException $e) {}
    }
}