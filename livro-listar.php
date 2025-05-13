<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
?>
<?php include_once 'config.php';
$result = mysqli_query($conn, "SELECT * FROM livro");
?>
<h2>Lista de Livros</h2>
<table class="table table-bordered table-striped table-hover mt-3">
  <thead>
    <tr>
      <th>ID</th>
      <th>Categoria</th>
      <th>Título</th>
      <th>Autor</th>
      <th>Editora</th>
      <th>Edição</th>
      <th>Localidade</th>
      <th>Ano</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td><?= $row['id_livro'] ?></td>
      <td><?= $row['categoria_id_categoria'] ?></td>
      <td><?= $row['titulo_livro'] ?></td>
      <td><?= $row['autor_livro'] ?></td>
      <td><?= $row['editora_livro'] ?></td>
      <td><?= $row['edicao_livro'] ?></td>
      <td><?= $row['localidade_livro'] ?></td>
      <td><?= $row['ano_livro'] ?></td>
      <td>
        <a href="?page=livro-editar&id=<?= $row['id_livro'] ?>" class="btn btn-warning btn-sm">Editar</a>
        <form method="POST" action="?page=livro-salvar" class="d-inline">
          <input type="hidden" name="acao" value="excluir">
          <input type="hidden" name="id" value="<?= $row['id_livro'] ?>">
          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir?')">Excluir</button>
        </form>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
