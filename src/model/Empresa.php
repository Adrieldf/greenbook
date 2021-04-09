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

    public function __construct(string $email, string $senha, string $razaoSocial, string $nomeFantasia)
    {
        $this->email = $email;
        $this->senha = $senha;
        $this->razaoSocial = $razaoSocial;
        $this->nomeFantasia = $nomeFantasia;
    }
}