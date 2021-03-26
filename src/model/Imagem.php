<?php

namespace greenbook\model;

/** @Entity() */
class Imagem
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private int $id;

    /** @Column(type="string") */
    private string $caminho;

    /** @ManyToOne(targetEntity="Publicacao") */
    private Publicacao $publicacao;

}