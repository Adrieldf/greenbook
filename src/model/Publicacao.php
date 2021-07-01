<?php

namespace greenbook\model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\OneToOne;

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

    /** @OneToOne(targetEntity="TarefaUsuario")
     *  @Column (nullable=true)
     */
    private TarefaUsuario $tarefa;

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

    /** @OneToMany(targetEntity="Comentario", mappedBy="publicacao", cascade="all") */
    private Collection $comentarios;

    /** @OneToMany(targetEntity="Imagem", mappedBy="publicacao", cascade="all") */
    private Collection $imagens;

    /** @ManyToMany(targetEntity="Reacao", cascade="all") */
    private Collection $reacao;
    
    /** @Column(type="string", nullable=true) */
    private string $imagem;

    /** @Column(type="string", nullable=true) */
    private string $descricao;

    public function __construct(string $texto)
    {
        $this->texto = $texto;
        $this->comentarios = new ArrayCollection();
        $this->imagens = new ArrayCollection();
        $this->reacao = new ArrayCollection();
    }

    public function addComentario(Comentario $comentario): void
    {
        $this->comentarios->add($comentario);
    }

    public function addImagem(Imagem $imagem): void
    {
        $this->imagens->add($imagem);
    }

    public function addReacao(Reacao $reacao): void
    {
        $this->reacao->add($reacao);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTexto(): string
    {
        return $this->texto;
    }

    public function setTexto(string $texto): void
    {
        $this->texto = $texto;
    }

    public function getTarefa(): TarefaUsuario
    {
        return $this->tarefa;
    }

    public function setTarefa(TarefaUsuario $tarefa): void
    {
        $this->tarefa = $tarefa;
    }

    public function getUsuario(): Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(Usuario $usuario): void
    {
        $this->usuario = $usuario;
    }

    public function getEmpresa(): Empresa
    {
        return $this->empresa;
    }

    public function setEmpresa(Empresa $empresa): void
    {
        $this->empresa = $empresa;
    }

    public function getComentarios(): Collection
    {
        return $this->comentarios;
    }

    public function setComentarios(Collection $comentarios): void
    {
        $this->comentarios = $comentarios;
    }

    public function getImagens(): Collection
    {
        return $this->imagens;
    }

    public function setImagens(Collection $imagens): void
    {
        $this->imagens = $imagens;
    }

    public function getReacao(): Collection
    {
        return $this->reacao;
    }

    public function setReacao(Collection $reacao): void
    {
        $this->reacao = $reacao;
    }
    public function getImagem(): string
    {
        return $this->imagem ?? "";
    }

    public function setImagem(string $imagem): void
    {
        $this->imagem = $imagem ?? "";
    }
    public function getDescricao(): string
    {
        return $this->descricao ?? "";
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao ?? "";
    }
}