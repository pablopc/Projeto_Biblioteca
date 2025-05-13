<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
?>
<?php
// categoria-cadastrar.php
?>
<h1>Cadastrar Categoria</h1>
<form action="?page=categoria-salvar" method="POST" class="mt-3">
  <input type="hidden" name="acao" value="cadastrar">
  <div class="mb-3">
    <label for="nome_categoria" class="form-label">Nome da Categoria</label>
    <input type="text" name="nome_categoria" id="nome_categoria" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-success">Salvar</button>
  <a href="?page=categoria-listar" class="btn btn-secondary">Voltar</a>
</form>
