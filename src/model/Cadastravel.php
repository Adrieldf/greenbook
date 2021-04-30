<?php

namespace greenbook\model;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\MappedSuperclass;

/** @MappedSuperclass */
abstract class Cadastravel
{
    /** @Column(type="string") */
    protected string $email;

    /** @Column(type="string") */
    protected string $senha;

    public function getEmail() {
        return $this->email;
    }
    public function setEmail(string $email){
        $this->email = $email;
    }
    public function getSenha() {
        return $this->senha;
    }
    public function setSenha(string $senha){
        $this->senha = $senha;
    }
}