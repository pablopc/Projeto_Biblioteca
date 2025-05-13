<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
?>
<?php // atendente-listar.php ?>
<h2>Lista de Atendentes</h2>
<table class="table table-bordered table-striped table-hover mt-3">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>CPF</th>
      <th>Email</th>
      <th>Telefone</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $result = mysqli_query($conn, "SELECT * FROM atendente");
    while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td><?= $row['id_atendente'] ?></td>
      <td><?= $row['nome_atendente'] ?></td>
      <td><?= $row['cpf_atendente'] ?></td>
      <td><?= $row['email_atendente'] ?></td>
      <td><?= $row['fone_atendente'] ?></td>
      <td>
        <a href="?page=atendente-editar&id=<?= $row['id_atendente'] ?>" class="btn btn-warning btn-sm">Editar</a>
        <form method="POST" action="?page=atendente-salvar" class="d-inline">
          <input type="hidden" name="acao" value="excluir">
          <input type="hidden" name="id" value="<?= $row['id_atendente'] ?>">
          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir?')">Excluir</button>
        </form>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
