<?php

namespace greenbook\model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\Column;

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

    /** @OneToOne(targetEntity="TarefaUsuario") */
    private TarefaUsuario $tarefaConcluida;

    /**
     * @ManyToOne(targetEntity="Usuario")
     * @Column (nullable=true)
     */
    private Usuario $usuario;

    /**
     * @ManyToOne(targetEntity="Empresa")
     * @Column (nullable=true)
     */
    private Empresa $empresa;

    /** @OneToMany(targetEntity="Comentario", mappedBy="publicacao") */
    private ArrayCollection $comentarios;

    /** @ManyToMany(targetEntity="Reacao") */
    private ArrayCollection $reacao;

    /** @OneToMany(targetEntity="Imagem", mappedBy="publicacao") */
    private ArrayCollection $imagem;


}