<?php

namespace greenbook\model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\OneToMany;

/** @Entity(repositoryClass="greenbook\repository\UsuarioRepository") */
class Usuario extends Cadastravel
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private int $id;

    /** @Column(type="string") */
    private string $nome;

    /** @Column(type="string", nullable=true) */
    private string $apelido;

    /** @Column(type="string", nullable=true) */
    private string $cpf;

    /** @Column(type="integer", nullable=true)  */
    private int $moedas;

    /** @Column(type="integer", nullable=true)  */
    private int $pontuacaoGeral;

    /** @ManyToMany(targetEntity="Titulo") */
    private ArrayCollection $titulos;

    /** @OneToMany(targetEntity="TarefaConcluida", mappedBy="tarefa") */
    private ArrayCollection $tarefas;

    public function __construct()
    {
    }

    public function fromCPF(string $nome, string $apelido, string $cpf): Usuario
    {
        $usuario = new Usuario();
        $usuario->nome = $nome;
        $usuario->apelido = $apelido;
        $usuario->cpf = $cpf;
        $usuario->moedas = 0;
        $usuario->pontuacaoGeral = 0;

        return $usuario;
    }

    public function fromCadastro(string $nome, string $email, string $senha): Usuario
    {
        $usuario = new Usuario();
        $usuario->nome = $nome;
        $usuario->setEmail($email);
        $usuario->setSenha($senha);
        $usuario->moedas = 0;
        $usuario->pontuacaoGeral = 0;

        return $usuario;
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

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getApelido(): string
    {
        return $this->apelido;
    }

    public function setApelido(string $apelido): void
    {
        $this->apelido = $apelido;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): void
    {
        $this->cpf = $cpf;
    }

    public function getMoedas(): int
    {
        return $this->moedas;
    }

    public function setMoedas(int $moedas): void
    {
        $this->moedas = $moedas;
    }

    public function getPontuacaoGeral(): int
    {
        return $this->pontuacaoGeral;
    }

    public function setPontuacaoGeral(int $pontuacaoGeral): void
    {
        $this->pontuacaoGeral = $pontuacaoGeral;
    }

    public function getTitulos(): ArrayCollection
    {
        return $this->titulos;
    }

    public function setTitulos(ArrayCollection $titulos): void
    {
        $this->titulos = $titulos;
    }

    public function getTarefas(): ArrayCollection
    {
        return $this->tarefas;
    }

    public function setTarefas(ArrayCollection $tarefas): void
    {
        $this->tarefas = $tarefas;
    }
}
