<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
?>
<?php // home.php ?>
<div class="container mt-5">
  <div class="text-center">
    <h1 class="display-5">📚 Bem-vindo(a) ao Folium!</h1>
    <p class="lead">Gerencie livros, usuários e empréstimos com praticidade!</p>
  </div>

  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mt-4">
    <div class="col">
      <div class="card h-100 shadow-sm">
        <div class="card-body text-center">
          <h5 class="card-title">📁 Categorias</h5>
          <p class="card-text">Gerencie os tipos de livros disponíveis.</p>
          <a href="?page=categoria-listar" class="btn btn-outline-primary">Acessar</a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100 shadow-sm">
        <div class="card-body text-center">
          <h5 class="card-title">📘 Livros</h5>
          <p class="card-text">Cadastre e consulte o acervo da biblioteca.</p>
          <a href="?page=livro-listar" class="btn btn-outline-primary">Acessar</a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100 shadow-sm">
        <div class="card-body text-center">
          <h5 class="card-title">👤 Usuários</h5>
          <p class="card-text">Visualize e registre leitores do sistema.</p>
          <a href="?page=usuario-listar" class="btn btn-outline-primary">Acessar</a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100 shadow-sm">
        <div class="card-body text-center">
          <h5 class="card-title">📄 Empréstimos</h5>
          <p class="card-text">Controle e acompanhe os empréstimos realizados.</p>
          <a href="?page=emprestimo-listar" class="btn btn-outline-primary">Acessar</a>
        </div>
      </div>    
    </div>
  </div>
</div>
