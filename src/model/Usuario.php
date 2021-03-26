<?php

namespace greenbook\model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/** @Entity() */
class Usuario extends Cadastravel
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private int $id;

    /** @Column(type="string") */
    private string $nome;

    /** @Column(type="string") */
    private string $apelido;

    /** @Column(type="string") */
    private string $cpf;

    /** @Column(type="integer") */
    private int $moedas;

    /** @Column(type="integer") */
    private int $pontuacaoGeral;

    /** @Column(type="integer") */
    private int $pontuacaoSemanal;

    /** @Column(type="integer") */
    private int $pontuacaoMensal;

    /** @ManyToMany(targetEntity="Titulo") */
    private ArrayCollection $titulos;

    /** @ManyToMany(targetEntity="Tarefa") */
    private ArrayCollection $tarefas;

    public function __construct(string $nome, string $apelido, string $cpf)
    {
        $this->nome = $nome;
        $this->apelido = $apelido;
        $this->cpf = $cpf;
        $this->tarefas = new ArrayCollection();
    }

    public function addPontos(int $pontos): int
    {
        $this->pontuacaoSemanal += $pontos;
        $this->pontuacaoMensal += $pontos;
        return $this->pontuacaoGeral += $pontos;
    }

    public function addMoedas(int $moedas): int
    {
        return $this->moedas += $moedas;
    }

    public function addTarefa(Tarefa $tarefa): Usuario
    {
        $this->tarefas->add($tarefa);
        return $this;
    }

    public function getTarefas(): Collection
    {
        return $this->tarefas;
    }
}