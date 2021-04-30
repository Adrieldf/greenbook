<?php

namespace greenbook\model;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;

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

    /** @ManyToOne(targetEntity="TipoDeTarefa") */
    private TipoDeTarefa $tipoDeTarefa;

    public function __construct(string $descricao, int $valorEmPontos, int $valorEmMoedas, TipoDeTarefa $tipoDeTarefa)
    {
        $this->descricao = $descricao;
        $this->valorEmPontos = $valorEmPontos;
        $this->valorEmMoedas = $valorEmMoedas;
        $this->tipoDeTarefa = $tipoDeTarefa;
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

    public function getTipoDeTarefa(): TipoDeTarefa
    {
        return $this->tipoDeTarefa;
    }

    public function setTipoDeTarefa(TipoDeTarefa $tipoDeTarefa): void
    {
        $this->tipoDeTarefa = $tipoDeTarefa;
    }


}