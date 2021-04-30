<?php

namespace greenbook\repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\TransactionRequiredException;
use greenbook\model\Usuario;

require_once __DIR__ . '/../../vendor/autoload.php';

class UsuarioRepository extends EntityRepository
{
    function findById(int $id): ?Usuario
    {
        $entityManager = $this->getEntityManager();
        try {
            return $entityManager->find(Usuario::class, $id);
        } catch (OptimisticLockException | TransactionRequiredException | ORMException $e) {
            return null;
        }
    }

    function findByEmail(string $email): ?Usuario //falta testar
    {
        $entityManager = $this->getEntityManager();
        return $entityManager->getRepository(Usuario::class)->findOneBy(array('email' => $email));
    }

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