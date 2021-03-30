<?php

namespace greenbook\repository;

use Doctrine\ORM\EntityRepository;
use greenbook\model\Publicacao;

require_once __DIR__ . '/../../vendor/autoload.php';

class PublicacaoRepository extends EntityRepository
{
    function save(Publicacao $publicacao): Publicacao
    {
        $entityManager = $this->getEntityManager();

        $entityManager->persist($publicacao);
        $entityManager->flush();
        return $publicacao;
    }

    function delete(int $id): void
    {
        $entityManager = $this->getEntityManager();

        $objeto = $entityManager->getReference(Publicacao::class, $id);
        $entityManager->remove($objeto);
        $entityManager->flush();
    }
}