<?php

namespace greenbook\model;

use Doctrine\Common\Collections\ArrayCollection;

/** @Entity(repositoryClass="greenbook\repository\PublicacaoRepository") */
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

    /** @OneToOne(targetEntity="TarefaConcluida") */
    private TarefaConcluida $tarefaConcluida;

    //private Cadastravel $publicador;

    /** @OneToMany(targetEntity="Comentario", mappedBy="publicacao") */
    private ArrayCollection $comentarios;

    /** @ManyToMany(targetEntity="Reacao") */
    private ArrayCollection $reacao;

    /** @OneToMany(targetEntity="Imagem", mappedBy="publicacao") */
    private ArrayCollection $imagem;

}