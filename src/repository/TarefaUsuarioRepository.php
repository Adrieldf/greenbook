<?php

namespace greenbook\repository;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityRepository;
use greenbook\model\TarefaUsuario;
use greenbook\model\Usuario;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\TransactionRequiredException;

class TarefaUsuarioRepository extends EntityRepository
{
    function findAllByConcluidaAndUsuario(bool $concluida, Usuario $usuario): array
    {
//        $qb = $this->getEntityManager()->createQueryBuilder();

        $entityManager = $this->getEntityManager();
        return $entityManager->getRepository(TarefaUsuario::class)
            ->findBy(array('concluida' => $concluida, 'usuario' => $usuario));
    }

    
    function save(TarefaUsuario $tarefaUsuario): ?TarefaUsuario
    {
        $entityManager = $this->getEntityManager();
        try {
            $entityManager->persist($tarefaUsuario);
            $entityManager->flush();
        } catch (OptimisticLockException | ORMException $e) {
            return null;
        }
        return $tarefaUsuario;
    }

}