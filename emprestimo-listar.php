<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
?>
<?php // emprestimo-listar.php ?>
<h2>Lista de Empréstimos</h2>
<table class="table table-bordered table-striped table-hover mt-3">
  <thead>
    <tr>
      <th>Livro</th>
      <th>Usuário</th>
      <th>Atendente</th>
      <th>Data Empréstimo</th>
      <th>Data Devolução</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT e.livro_id_livro, e.usuario_id_usuario, l.titulo_livro, u.nome_usuario, a.nome_atendente, e.data_emprestimo, e.data_devolucao
            FROM emprestimo e
            JOIN livro l ON e.livro_id_livro = l.id_livro
            JOIN usuario u ON e.usuario_id_usuario = u.id_usuario
            JOIN atendente a ON e.atendente_id_atendente = a.id_atendente";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
    ?>
    <tr>
      <td><?= $row['titulo_livro'] ?></td>
      <td><?= $row['nome_usuario'] ?></td>
      <td><?= $row['nome_atendente'] ?></td>
      <td><?= $row['data_emprestimo'] ?></td>
      <td><?= $row['data_devolucao'] ?></td>
      <td>
        <a href="?page=emprestimo-editar&livro_id=<?= $row['livro_id_livro'] ?>&usuario_id=<?= $row['usuario_id_usuario'] ?>" class="btn btn-warning btn-sm">Editar</a>
        <form method="POST" action="?page=emprestimo-salvar" class="d-inline">
          <input type="hidden" name="acao" value="excluir">
          <input type="hidden" name="livro_id" value="<?= $row['livro_id_livro'] ?>">
          <input type="hidden" name="usuario_id" value="<?= $row['usuario_id_usuario'] ?>">
          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir?')">Excluir</button>
        </form>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
