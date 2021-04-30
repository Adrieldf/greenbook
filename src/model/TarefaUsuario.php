<?php

namespace greenbook\model;

use DateTime;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;

/** @Entity*/
class TarefaUsuario
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="bigint")
     */
    private int $id;

    /** @Column(type="boolean") */
    private bool $concluida;

    /** @Column(type="datetime", nullable=true) */
    private DateTime $conclusao;

    /** @ManyToOne(targetEntity="Tarefa") */
    private Tarefa $tarefa;

    /** @ManyToOne(targetEntity="Usuario") */
    private Usuario $usuario;

    public function __construct(Tarefa $tarefa, Usuario $usuario)
    {
        $this->concluida=false;
        $this->tarefa = $tarefa;
        $this->usuario = $usuario;
    }

    public function concluir(): void
    {
        $this->concluida = true;
        $this->conclusao = new DateTime();

        $moedas = $this->tarefa->getValorEmMoedas();
        $pontos = $this->tarefa->getValorEmPontos();

        $this->usuario->addMoedas($moedas);
        $this->usuario->addPontos($pontos);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function isConcluida(): bool
    {
        return $this->concluida;
    }

    public function setConcluida(bool $concluida): void
    {
        $this->concluida = $concluida;
    }

    public function getConclusao(): DateTime
    {
        return $this->conclusao;
    }

    public function setConclusao(DateTime $conclusao): void
    {
        $this->conclusao = $conclusao;
    }

    public function getTarefa(): Tarefa
    {
        return $this->tarefa;
    }

    public function setTarefa(Tarefa $tarefa): void
    {
        $this->tarefa = $tarefa;
    }

    public function getUsuario(): Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(Usuario $usuario): void
    {
        $this->usuario = $usuario;
    }
}