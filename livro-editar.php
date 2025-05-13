<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
?>
?><?php include_once 'config.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM livro WHERE id_livro=$id");
$livro = mysqli_fetch_assoc($result);
?>
<h2>Editar Livro</h2>
<form action="?page=livro-salvar" method="POST">
  <input type="hidden" name="acao" value="editar">
  <input type="hidden" name="id" value="<?= $livro['id_livro'] ?>">
  <div class="mb-3">
    <label class="form-label">ID da Categoria:</label>
    <input type="number" name="categoria_id" value="<?= $livro['categoria_id_categoria'] ?>" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Título:</label>
    <input type="text" name="titulo" value="<?= $livro['titulo_livro'] ?>" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Autor:</label>
    <input type="text" name="autor" value="<?= $livro['autor_livro'] ?>" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Editora:</label>
    <input type="text" name="editora" value="<?= $livro['editora_livro'] ?>" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Edição:</label>
    <input type="text" name="edicao" value="<?= $livro['edicao_livro'] ?>" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Localidade:</label>
    <input type="text" name="localidade" value="<?= $livro['localidade_livro'] ?>" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Ano:</label>
    <input type="number" name="ano" value="<?= $livro['ano_livro'] ?>" class="form-control">
  </div>
  <button type="submit" class="btn btn-success">Salvar</button>
  <a href="?page=livro-listar" class="btn btn-secondary">Voltar</a>
</form>
