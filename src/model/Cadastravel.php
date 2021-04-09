<?php

namespace greenbook\model;

/** @MappedSuperclass */
abstract class Cadastravel
{
    /** @Column(type="string") */
    protected string $email;

    /** @Column(type="string") */
    protected string $senha;

}