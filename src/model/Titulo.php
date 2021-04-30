<?php

namespace greenbook\model;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;

/** @Entity(repositoryClass="greenbook\repository\TituloRepository") */
class Titulo extends Recompensa
{
    /** @Column(type="string") */
    private string $nome;

    public function __construct(string $descricao, int $valor, bool $disponivelParaCompra, string $nome)
    {
        $this->descricao = $descricao;
        $this->valor = $valor;
        $this->disponivelParaCompra = $disponivelParaCompra;
        $this->nome = $nome;
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

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }
}