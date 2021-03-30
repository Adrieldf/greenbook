<?php

namespace greenbook\repository;

use Doctrine\ORM\EntityRepository;
use greenbook\model\Usuario;

require_once __DIR__ . '/../../vendor/autoload.php';

class UsuarioRepository extends EntityRepository
{
    function save(Usuario $usuario): Usuario
    {
        $entityManager = $this->getEntityManager();

        $entityManager->persist($usuario);
        $entityManager->flush();
        return $usuario;
    }

    function delete(int $id): void
    {
        $entityManager = $this->getEntityManager();

        $objeto = $entityManager->getReference(Usuario::class, $id);
        $entityManager->remove($objeto);
        $entityManager->flush();
    }
}