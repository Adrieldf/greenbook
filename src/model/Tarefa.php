<?php

namespace greenbook\model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @Entity
 */
class Tarefa
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;

    /**
     * @Column(type="string")
     */
    private string $descricao;

    /**
     * @Column(type="integer")
     */
    private int $valorEmPontos;

    /**
     * @Column(type="integer")
     */
    private int $valorEmMoedas;

    public function getId()
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