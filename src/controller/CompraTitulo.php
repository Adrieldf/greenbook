<?php

use greenbook\helper\EntityManagerFactory;
use greenbook\model\Titulo;
use greenbook\repository\TituloRepository;

$idTitulo = @$_POST["idTitulo"];



function tituloRepositoryClass($myClass): TituloRepository
{
    return $myClass;
}

?>