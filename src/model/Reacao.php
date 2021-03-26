<?php

namespace greenbook\model;

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
    private string $nome;

    /** @ManyToOne(targetEntity="Usuario") */
    private Usuario $usuario;
}