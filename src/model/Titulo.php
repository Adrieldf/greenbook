<?php

namespace greenbook\model;

/** @Entity() */
class Titulo extends Recompensa
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private int $id;

    /** @Column(type="string") */
    private string $titulo;
}