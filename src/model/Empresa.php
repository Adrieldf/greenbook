<?php

namespace greenbook\model;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

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

    /** @Column(type="string", nullable=true) */
    private string $nomeFantasia;

    public function __construct(string $email, string $senha, string $razaoSocial)
    {
        $this->email = $email;
        $this->senha = $senha;
        $this->razaoSocial = $razaoSocial;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setSenha(string $senha): void
    {
        $this->senha = $senha;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getRazaoSocial(): string
    {
        return $this->razaoSocial;
    }

    public function setRazaoSocial(string $razaoSocial): void
    {
        $this->razaoSocial = $razaoSocial;
    }

    public function getNomeFantasia(): string
    {
        return $this->nomeFantasia;
    }

    public function setNomeFantasia(string $nomeFantasia): void
    {
        $this->nomeFantasia = $nomeFantasia;
    }
}