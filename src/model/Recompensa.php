<?php

namespace greenbook\model;

/** @Entity() */
class Recompensa
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private int $id;

    /** @Column(type="string") */
    private string $descricao;

    /** @Column(type="integer") */
    private int $valor;

    /** @Column(type="boolean") */
    private bool $disponivelParaCompra;
}