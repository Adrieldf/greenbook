<?php

namespace greenbook\model;

/** @Entity(repositoryClass="greenbook\repository\EmpresaRepository") */
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