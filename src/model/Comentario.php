<?php

namespace greenbook\model;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;

/** @Entity(repositoryClass="greenbook\repository\ComentarioRepository") */
class Comentario
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private int $id;

    /** @Column(type="string") */
    private string $comentario;

    /** @ManyToOne(targetEntity="Publicacao") */
    private Publicacao $publicacao;

    /** @ManyToOne(targetEntity="Usuario") */
    private Usuario $usuario;

    public function __construct(string $comentario, Usuario $usuario, Publicacao $publicacao)
    {
        $this->comentario = $comentario;
        $this->usuario = $usuario;
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

    public function getComentario(): string
    {
        return $this->comentario;
    }

    public function setComentario(string $comentario): void
    {
        $this->comentario = $comentario;
    }

    public function getPublicacao(): Publicacao
    {
        return $this->publicacao;
    }

    public function setPublicacao(Publicacao $publicacao): void
    {
        $this->publicacao = $publicacao;
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