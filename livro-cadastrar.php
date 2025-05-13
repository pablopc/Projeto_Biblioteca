<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

include_once 'config.php';

// Buscar categorias do banco
$categorias = mysqli_query($conn, "SELECT id_categoria, nome_categoria FROM categoria");
?>

<h2>Cadastrar Livro</h2>

<form action="?page=livro-salvar" method="POST" class="mt-3">

  <div class="mb-3">
    <label class="form-label">Categoria:</label>
    <select name="categoria_id" class="form-select" required>
      <option value="">Selecione uma categoria</option>
      <?php while ($cat = mysqli_fetch_assoc($categorias)) : ?>
        <option value="<?= $cat['id_categoria'] ?>"><?= htmlspecialchars($cat['nome_categoria']) ?></option>
      <?php endwhile; ?>
    </select>
  </div>

  <div class="mb-3">
    <label class="form-label">Título:</label>
    <input type="text" name="titulo" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Autor:</label>
    <input type="text" name="autor" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Editora:</label>
    <input type="text" name="editora" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Edição:</label>
    <input type="text" name="edicao" class="form-control">
  </div>

  <div class="mb-3">
    <label class="form-label">Localidade:</label>
    <input type="text" name="localidade" class="form-control">
  </div>

  <div class="mb-3">
    <label class="form-label">Ano:</label>
    <input type="number" name="ano" class="form-control">
  </div>

  <button type="submit" class="btn btn-success">Salvar</button>
  <a href="?page=livro-listar" class="btn btn-secondary">Voltar</a>

</form>
