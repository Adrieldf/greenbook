<?php

namespace greenbook\model;

use DateTime;

/** @Entity*/
class TarefaConcluida
{
    /** @Column(type="string") */
    private bool $concluida;

    /** @Column(type="datetime") */
    private DateTime $dateTime;

    /** @ManyToOne(targetEntity="Tarefa") */
    private Tarefa $tarefa;
}