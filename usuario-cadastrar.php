<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
?>
<?php // usuario-cadastrar.php ?>
<h2>Cadastrar Usuário</h2>
<form action="?page=usuario-salvar" method="POST" class="mt-3">
  <input type="hidden" name="acao" value="cadastrar">
  <div class="mb-3">
    <label class="form-label">Nome:</label>
    <input type="text" name="nome" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Email:</label>
    <input type="email" name="email" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Telefone:</label>
    <input type="text" name="fone" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">CPF:</label>
    <input type="text" name="cpf" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Data de Nascimento:</label>
    <input type="date" name="dt_nasc" class="form-control">
  </div>
  <button type="submit" class="btn btn-success">Salvar</button>
  <a href="?page=usuario-listar" class="btn btn-secondary">Voltar</a>
</form>
