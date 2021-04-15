<?php

namespace greenbook\model;

/** @Entity*/
class TipoDeTarefa
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
    private string $descricao;
}