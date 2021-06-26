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

        </ul>

        <?php if ($_nomeUsuario != "") : ?>
          <div class="d-flex">
            <div class="dropdown drop-down">
              <button class="btn btn-default dropdown-toggle no-focus-box-shadow" type="button" id="ddmPerfil">
                <?= $_nomeUsuario ?>
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu drop-down-item-frame" id="ddmPerfilItens">
                <?php if ($_admin != "" && $_admin) : ?>
                  <li class="drop-down-item"><label>Admin!</label></li>
                <?php endif; ?>
                <li class="drop-down-item"><a href="postagens.php">Postagens</a></li>
                <?php if ($_empresa != "" && $_empresa) : ?>
                  <li class="drop-down-item"><a href="perfil-empresa.php?id=<?= $_idUsuario ?>">Perfil</a></li>
                <?php else : ?>
                  <li class="drop-down-item"><a href="perfil-usuario.php?id=<?= $_idUsuario ?>">Perfil</a></li>
                <?php endif; ?>


                <li class="drop-down-item"><a href="../controller/LogoutController.php">Sair</a></li>
              </ul>
            </div>
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

    <script type="text/javascript" src="../scripts/NavBar.js"></script>
</header>