<?php

namespace greenbook\model;

/** @Entity() */
class Empresa extends Cadastravel
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private int $id;

    /** @Column(type="string") */
    private string $razaoSocial;

    /** @Column(type="string") */
    private string $nomeFantasia;
}