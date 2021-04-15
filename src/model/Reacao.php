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

    /** @ManyToOne(targetEntity="Usuario") */
    private Usuario $usuario;
}