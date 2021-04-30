<?php

namespace greenbook\model;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;

/** @Entity() */
class Imagem
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private int $id;

    /** @Column(type="string") */
    private string $caminho;

    /** @Column(type="integer") */
    private int $tamanho;

    /** @ManyToOne(targetEntity="Publicacao") */
    private Publicacao $publicacao;

    public function __construct(string $caminho, int $tamanho, Publicacao $publicacao)
    {
        $this->caminho = $caminho;
        $this->tamanho = $tamanho;
        $this->publicacao = $publicacao;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCaminho(): string
    {
        return $this->caminho;
    }

    public function setCaminho(string $caminho): void
    {
        $this->caminho = $caminho;
    }

    public function getTamanho(): int
    {
        return $this->tamanho;
    }

    public function setTamanho(int $tamanho): void
    {
        $this->tamanho = $tamanho;
    }

    public function getPublicacao(): Publicacao
    {
        return $this->publicacao;
    }

    public function setPublicacao(Publicacao $publicacao): void
    {
        $this->publicacao = $publicacao;
    }
}