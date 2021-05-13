<?php

namespace greenbook\model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /** @Column(type="integer", nullable=true) */
    private int $moedas;

    /** @Column(type="integer", nullable=true) */
    private int $pontuacaoGeral;

    /** @ManyToMany(targetEntity="Titulo") */
    private Collection $titulos;

    /** @OneToMany(targetEntity="TarefaUsuario", mappedBy="usuario", cascade="all") */
    private Collection $tarefas;

    /** @Column(type="string", nullable=true) */
    private string $descricao;

    /** @Column(type="string", nullable=true) */
    private string $cep;

    /** @Column(type="string", nullable=true) */
    private string $rua;

    /** @Column(type="string", nullable=true) */
    private string $complemento;

    /** @Column(type="string", nullable=true) */
    private string $numero;

    /** @Column(type="string", nullable=true) */
    private string $bairro;

    /** @Column(type="string", nullable=true) */
    private string $cidade;

    /** @Column(type="string", nullable=true) */
    private string $estado;

    /** @Column(type="string", nullable=true) */
    private string $pais;

    /** @Column(type="boolean", nullable=true) */
    private string $admin;


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
        $this->titulos = new ArrayCollection();
        $this->tarefas = new ArrayCollection();
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
        $this->titulos = new ArrayCollection();
        $this->tarefas = new ArrayCollection();
        return $usuario;
    }

    public function addMoedas(int $moedas): void
    {
        $this->moedas = $this->moedas + $moedas;
    }

    public function addPontos(int $pontos): void
    {
        $this->pontuacaoGeral = $this->pontuacaoGeral + $pontos;
    }

    public function addTarefa(TarefaUsuario $tarefa): void
    {
        $this->tarefas->add($tarefa);
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

    public function getTitulos(): Collection
    {
        return $this->titulos;
    }

    public function setTitulos(ArrayCollection $titulos): void
    {
        $this->titulos = $titulos;
    }

    public function getTarefas(): Collection
    {
        return $this->tarefas;
    }

    public function setTarefas(ArrayCollection $tarefas): void
    {
        $this->tarefas = $tarefas;
    }

    public function getDescricao(): string
    {
        return $this->descricao ?? "";
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getCep(): string
    {
        return $this->cep ?? "";
    }

    public function setCep(string $cep): void
    {
        $this->cep = $cep;
    }

    public function getRua(): string
    {
        return $this->rua ?? "";
    }

    public function setRua(string $rua): void
    {
        $this->rua = $rua;
    }

    public function getComplemento(): string
    {
        return $this->complemento ?? "";
    }

    public function setComplemento(string $complemento): void
    {
        $this->complemento = $complemento;
    }

    public function getNumero(): string
    {
        return $this->numero ?? "";
    }

    public function setNumero(string $numero): void
    {
        $this->numero = $numero;
    }

    public function getBairro(): string
    {
        return $this->bairro ?? "";
    }

    public function setBairro(string $bairro): void
    {
        $this->bairro = $bairro;
    }

    public function getCidade(): string
    {
        return $this->cidade ?? "";
    }

    public function setCidade(string $cidade): void
    {
        $this->cidade = $cidade;
    }

    public function getEstado(): string
    {
        return $this->estado ?? "";
    }

    public function setEstado(string $estado): void
    {
        $this->estado = $estado;
    }

    public function getPais(): string
    {
        return $this->pais ?? "";
    }

    public function setPais(string $pais): void
    {
        $this->pais = $pais;
    }

    public function isAdmin(): bool
    {
        return $this->admin ?? false;
    }

    public function setAdmin(bool $admin): void
    {
        $this->admin = $admin;
    }
}
