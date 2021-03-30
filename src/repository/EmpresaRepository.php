<?php

namespace greenbook\repository;

use Doctrine\ORM\EntityRepository;
use greenbook\model\Empresa;

require_once __DIR__ . '/../../vendor/autoload.php';

class EmpresaRepository extends EntityRepository
{
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