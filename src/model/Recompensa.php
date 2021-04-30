<?php

namespace greenbook\model;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

/** @Entity(repositoryClass="greenbook\repository\RecompensaRepository") */
class Recompensa
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    protected int $id;

    /** @Column(type="string") */
    protected string $descricao;

    /** @Column(type="integer") */
    protected int $valor;

    /** @Column(type="boolean") */
    protected bool $disponivelParaCompra;

    public function __construct(string $descricao, int $valor, bool $disponivelParaCompra)
    {
        $this->descricao = $descricao;
        $this->valor = $valor;
        $this->disponivelParaCompra = $disponivelParaCompra;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getValor(): int
    {
        return $this->valor;
    }

    public function setValor(int $valor): void
    {
        $this->valor = $valor;
    }

    public function isDisponivelParaCompra(): bool
    {
        return $this->disponivelParaCompra;
    }

    public function setDisponivelParaCompra(bool $disponivelParaCompra): void
    {
        $this->disponivelParaCompra = $disponivelParaCompra;
    }
}