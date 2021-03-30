<?php

namespace greenbook\repository;

use Doctrine\ORM\EntityRepository;
use greenbook\model\Comentario;

require_once __DIR__ . '/../../vendor/autoload.php';

class ComentarioRepository extends EntityRepository
{
    function save(Comentario $comentario): Comentario
    {
        $entityManager = $this->getEntityManager();

        $entityManager->persist($comentario);
        $entityManager->flush();
        return $comentario;
    }

    function delete(int $id): void
    {
        $entityManager = $this->getEntityManager();

        $objeto = $entityManager->getReference(Comentario::class, $id);
        $entityManager->remove($objeto);
        $entityManager->flush();
    }
}