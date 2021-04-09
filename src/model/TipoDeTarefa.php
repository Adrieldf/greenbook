<?php

namespace greenbook\model;

/** @Entity*/
class TipoDeTarefa
{
    /** @Column(type="string") */
    private string $nome;

    /** @Column(type="string") */
    private string $descricao;
}