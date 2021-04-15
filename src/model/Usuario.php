<?php

namespace greenbook\model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

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

    /** @Column(type="string") */
    private string $apelido;

    /** @Column(type="string") */
    private string $cpf;

    /** @Column(type="integer") */
    private int $moedas;

    /** @Column(type="integer") */
    private int $pontuacaoGeral;

    /** @Column(type="integer") */
    private int $pontuacaoSemanal;

    /** @Column(type="integer") */
    private int $pontuacaoMensal;

    /** @ManyToMany(targetEntity="Titulo") */
    private ArrayCollection $titulos;

    /** @ManyToMany(targetEntity="Tarefa") */
    private ArrayCollection $tarefas;

    public function __construct()
    {
       
    }

    public function fromCPF(string $nome, string $apelido, string $cpf){
        $usuario = new Usuario();
        $usuario->nome = $nome;
        $usuario->apelido = $apelido;
        $usuario->cpf = $cpf;
        $usuario->titulos = new ArrayCollection();
        $usuario->tarefas = new ArrayCollection();
        $usuario->moedas = 0;
        $usuario->pontuacaoGeral = 0;
        $usuario->pontuacaoSemanal = 0;
        $usuario->pontuacaoMensal = 0;
        return $usuario;
    }

    public function fromCadastro(string $nome, string $email, string $senha){
        $usuario = new Usuario();
        $usuario->nome = $nome;
        $usuario->setEmail($email);
        $usuario->setSenha($senha);
        $usuario->titulos = new ArrayCollection();
        $usuario->tarefas = new ArrayCollection();
        $usuario->moedas = 0;
        $usuario->pontuacaoGeral = 0;
        $usuario->pontuacaoSemanal = 0;
        $usuario->pontuacaoMensal = 0;
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

    public function addTarefa(Tarefa $tarefa): Usuario
    {
        $this->tarefas->add($tarefa);
        return $this;
    }

    public function getTarefas(): Collection
    {
        return $this->tarefas;
    }
}