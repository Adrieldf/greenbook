<?php

namespace greenbook\model;

/** @Entity() */
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
}