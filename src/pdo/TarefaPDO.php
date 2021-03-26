<?php

namespace greenbook\pdo;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use greenbook\Helper\EntityManagerFactory;
use greenbook\model\Tarefa;

require_once __DIR__ . '/../../vendor/autoload.php';

class TarefaPDO
{
    private EntityManagerInterface $entityManager;
    private ObjectRepository $repository;

    public function construct()
    {
        $entityManagerFactory = new EntityManagerFactory();
        $this->entityManager = $entityManagerFactory->getEntityManager();
        $this->repository = $this->entityManager->getRepository(Tarefa::class);
    }

    function save(Tarefa $tarefa): Tarefa
    {
        $this->entityManager->persist($tarefa);
        $this->entityManager->flush();
        return $tarefa;
    }


    function findAll(): array
    {
        /** @var Tarefa[] $list */
        $list = $this->repository->findAll();
        return $list;
    }

    function findOneById(int $id): Tarefa
    {
        /** @var Tarefa $result */
        $result = $this->repository->find($id);
        return $result;
    }

    function findOneByDescricao(string $descricao): Tarefa
    {
        /** @var Tarefa $result */
        $result = $this->repository->findOneBy(
            ['descricao' => $descricao]
        );
        return $result;
    }
}