<?php

namespace greenbook\model;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;

/** @Entity() */
class Reacao
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private int $id;

    /** @Column(type="string") */
    private string $tipo;

    /** @ManyToOne(targetEntity="Usuario") */
    private Usuario $usuario;

    public function __construct(string $tipo, Usuario $usuario)
    {
        $this->tipo = $tipo;
        $this->usuario = $usuario;
    }
}