<?php

namespace greenbook\model;

use DateTime;

/** @Entity*/
class TarefaConcluida
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="bigint")
     */
    private int $id;

    /** @Column(type="string") */
    private bool $concluida;

    /** @Column(type="datetime") */
    private DateTime $conclusao;

    /** @ManyToOne(targetEntity="Tarefa") */
    private Tarefa $tarefa;

    /** @Column(type="string") */
    private Usuario $Usuario;
}