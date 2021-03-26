<?php


class Usuario extends Cadastravel
{
    private string $nome;
    private string $apelido;
    private string $cpf;
    private int $moedas;
    private int $pontuacaoGeral;
    private int $pontuacaoSemanal;
    private int $pontuacaoMensal;
    private array $titulos;
    private array $tarefas;

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
}