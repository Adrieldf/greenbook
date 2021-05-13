<?php
require_once("header.php");
session_start();
$_nomeUsuario = @$_SESSION["nome_usuario"];
$_idUsuario = @$_SESSION["id_usuario"];
$_empresa = @$_SESSION["empresa"];
$_admin = @$_SESSION["admin"];
?>

<header>
  <nav class="navbar navbar-expand-lg navbar-light navbar-bg">
    <div class="container-fluid">
      <a class="navbar-brand navbar-title" href="index.php">Greenbook</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

          <!-- Usar o dropdown aqui para quando o usuario estiver logado depois -->
          <!--    <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Link
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
     -->
        </ul>
        <?php if ($_admin != "" && $_admin) : ?>
          <label>Admin!</label>
        <?php endif; ?>
        <?php if ($_nomeUsuario != "") : ?>
          <div class="d-flex">

            <?php if ($_empresa != "" && $_empresa) : ?>
              <button class="btn btn-outline-success navbar-button" onclick="window.location.href='perfil-empresa.php?id=<?= $_idUsuario ?>';"> <?= $_nomeUsuario ?> </button>
            <?php else : ?>
              <button class="btn btn-outline-success navbar-button" onclick="window.location.href='perfil-usuario.php?id=<?= $_idUsuario ?>';"> <?= $_nomeUsuario ?> </button>
            <?php endif; ?>
            &nbsp;
            <button class="btn btn-outline-success navbar-button" onclick="window.location.href='../controller/LogoutController.php';">Sair</button>
          </div>
        <?php else : ?>
          <div class="d-flex">
            <button class="btn btn-outline-success navbar-button" onclick="window.location.href='signup.php';">Cadastrar-se</button>
            &nbsp;
            <button class="btn btn-outline-success navbar-button" onclick="window.location.href='login.php';">Login</button>
          </div>
        <?php endif; ?>


      </div>
    </div>
</header>