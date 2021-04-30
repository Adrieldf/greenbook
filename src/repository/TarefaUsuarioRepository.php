<?php

namespace greenbook\repository;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityRepository;
use greenbook\model\TarefaUsuario;
use greenbook\model\Usuario;

class TarefaUsuarioRepository extends EntityRepository
{
    function findAllByConcluidaAndUsuario(bool $concluida, Usuario $usuario): array
    {
//        $qb = $this->getEntityManager()->createQueryBuilder();

        $entityManager = $this->getEntityManager();
        return $entityManager->getRepository(TarefaUsuario::class)
            ->findBy(array('concluida' => $concluida, 'usuario' => $usuario));
    }

}