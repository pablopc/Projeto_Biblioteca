<?php 
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>📚 Folium</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="index.php">📚 Folium</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Categoria</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=categoria-listar">Listar</a></li>
            <li><a class="dropdown-item" href="?page=categoria-cadastrar">Cadastrar</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Livro</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=livro-listar">Listar</a></li>
            <li><a class="dropdown-item" href="?page=livro-cadastrar">Cadastrar</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Atendente</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=atendente-listar">Listar</a></li>
            <li><a class="dropdown-item" href="?page=atendente-cadastrar">Cadastrar</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Usuário</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=usuario-listar">Listar</a></li>
            <li><a class="dropdown-item" href="?page=usuario-cadastrar">Cadastrar</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Empréstimo</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=emprestimo-listar">Listar</a></li>
            <li><a class="dropdown-item" href="?page=emprestimo-cadastrar">Cadastrar</a></li>
          </ul>
        </li>
        <!-- Adicionar o botão de Logout na navbar -->
        <li class="nav-item">
          <a href="logout.php" class="btn btn-outline-light">Sair</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<main class="container">
    <?php
    include('config.php');
    switch (@$_REQUEST['page']) {
        case 'categoria-listar': include('categoria-listar.php'); break;
        case 'categoria-cadastrar': include('categoria-cadastrar.php'); break;
        case 'categoria-editar': include('categoria-editar.php'); break;
        case 'categoria-salvar': include('categoria-salvar.php'); break;

        case 'livro-listar': include('livro-listar.php'); break;
        case 'livro-cadastrar': include('livro-cadastrar.php'); break;
        case 'livro-editar': include('livro-editar.php'); break;
        case 'livro-salvar': include('livro-salvar.php'); break;

        case 'atendente-listar': include('atendente-listar.php'); break;
        case 'atendente-cadastrar': include('atendente-cadastrar.php'); break;
        case 'atendente-editar': include('atendente-editar.php'); break;
        case 'atendente-salvar': include('atendente-salvar.php'); break;

        case 'usuario-listar': include('usuario-listar.php'); break;
        case 'usuario-cadastrar': include('usuario-cadastrar.php'); break;
        case 'usuario-editar': include('usuario-editar.php'); break;
        case 'usuario-salvar': include('usuario-salvar.php'); break;

        case 'emprestimo-listar': include('emprestimo-listar.php'); break;
        case 'emprestimo-cadastrar': include('emprestimo-cadastrar.php'); break;
        case 'emprestimo-editar': include('emprestimo-editar.php'); break;
        case 'emprestimo-salvar': include('emprestimo-salvar.php'); break;
        default: include('home.php'); break;
    }
    ?>
</main>

<footer class="footer bg-dark text-white text-center py-3 fixed-bottom">
  &copy; 2025 Todos os Direitos Reservados
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
