<?php

namespace greenbook\repository;

use Doctrine\ORM\EntityRepository;
use greenbook\model\Tarefa;

require_once __DIR__ . '/../../vendor/autoload.php';

class TarefaRepository extends EntityRepository
{
    function save(Tarefa $tarefa): Tarefa
    {
        $entityManager = $this->getEntityManager();

        $entityManager->persist($tarefa);
        $entityManager->flush();
        return $tarefa;
    }

    function update(int $id,Tarefa $tarefa): Tarefa
    {
        $entityManager = $this->getEntityManager();

        /** @var Tarefa $objetoAntigo */
        $objetoAntigo = $entityManager->getReference(Tarefa::class, $id);
        $objetoAntigo
            ->setDescricao($tarefa->getDescricao())
            ->setValorEmPontos($tarefa->getValorEmPontos())
            ->setValorEmMoedas($tarefa->getValorEmMoedas());

        $entityManager->flush();
        return $objetoAntigo;
    }

    function delete(int $id): void
    {
        $entityManager = $this->getEntityManager();

        $objeto = $entityManager->getReference(Tarefa::class, $id);
        $entityManager->remove($objeto);
        $entityManager->flush();
    }

    //não funciona
    function findOneByDescricao(string $descricao): Tarefa
    {
        $qb = $this->getEntityManager()->createQueryBuilder();

        return $qb->select('tarefa')
            ->from('Tarefa', 'tarefa')
            ->where('tarefa = ?1')
            ->getQuery()
            ->getResult();
    }
}