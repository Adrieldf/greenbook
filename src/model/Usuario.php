<?php

namespace greenbook\model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;

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
        return $usuario;
    }

    public function fromCadastro(string $nome, string $email, string $senha): Usuario
    {
        $usuario = new Usuario();
        $usuario->nome = $nome;
        $usuario->setEmail($email);
        $usuario->setSenha($senha);
        return $usuario;
    }

    public function addPontos(int $pontos): int
    {
        $this->pontuacaoSemanal += $pontos;
        $this->pontuacaoMensal += $pontos;
        return $this->pontuacaoGeral += $pontos;
    }

    public function addMoedas(int $moedas): int
    {
        return $this->moedas += $moedas;
    }

    public function getTarefas(): Collection
    {
        return $this->tarefas;
    }
}