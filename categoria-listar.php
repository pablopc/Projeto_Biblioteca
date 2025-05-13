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
$sql = "SELECT * FROM categoria";
$res = $conn->query($sql);
?>
<h1>Listar Categoria</h1>
<?php if ($res->num_rows > 0): ?>
<table class="table table-bordered table-striped table-hover mt-3">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = $res->fetch_object()): ?>
    <tr>
      <td><?= $row->id_categoria ?></td>
      <td><?= $row->nome_categoria ?></td>
      <td>
        <a href="?page=categoria-editar&id=<?= $row->id_categoria ?>" class="btn btn-warning btn-sm">Editar</a>
        <form method="POST" action="?page=categoria-salvar" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir?')">
          <input type="hidden" name="acao" value="excluir">
          <input type="hidden" name="id_categoria" value="<?= $row->id_categoria ?>">
          <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
        </form>
      </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>
<?php else: ?>
<p>Nenhuma categoria encontrada.</p>
<?php endif; ?>
