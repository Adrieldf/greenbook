<?php

namespace greenbook\model;

/** @MappedSuperclass */
abstract class Cadastravel
{
    /** @Column(type="string") */
    private string $email;

    /** @Column(type="string") */
    private string $senha;
}