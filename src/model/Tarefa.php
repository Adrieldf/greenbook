<?php

namespace greenbook\model;

/** @Entity(repositoryClass="greenbook\repository\TarefaRepository") */
class Tarefa
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private int $id;

    /** @Column(type="string") */
    private string $descricao;

    /** @Column(type="integer") */
    private int $valorEmPontos;

    /** @Column(type="integer") */
    private int $valorEmMoedas;


    public function __construct(string $descricao, int $valorEmPontos, int $valorEmMoedas)
    {
        $this->descricao = $descricao;
        $this->valorEmPontos = $valorEmPontos;
        $this->valorEmMoedas = $valorEmMoedas;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): Tarefa
    {
        $this->descricao = $descricao;
        return $this;
    }

    public function getValorEmPontos(): int
    {
        return $this->valorEmPontos;
    }

    public function setValorEmPontos(int $valorEmPontos): Tarefa
    {
        $this->valorEmPontos = $valorEmPontos;
        return $this;
    }

    public function getValorEmMoedas(): int
    {
        return $this->valorEmMoedas;
    }

    public function setValorEmMoedas(int $valorEmMoedas): Tarefa
    {
        $this->valorEmMoedas = $valorEmMoedas;
        return $this;
    }
}