<?php

namespace greenbook\model;

use Doctrine\Common\Collections\ArrayCollection;

/** @Entity() */
class Publicacao
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private int $id;

    /** @Column(type="string") */
    private string $texto;

    /** @ManyToOne(targetEntity="Tarefa") */
    private Tarefa $tarefa;

    //private Cadastravel $publicador;

    /** @OneToMany(targetEntity="Comentario", mappedBy="publicacao") */
    private ArrayCollection $comentarios;

    /** @ManyToMany(targetEntity="Reacao") */
    private ArrayCollection $reacao;

    /** @OneToMany(targetEntity="Imagem", mappedBy="publicacao") */
    private ArrayCollection $imagem;

}