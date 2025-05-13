<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
?>
<?php // usuario-listar.php ?>
<h2>Lista de Usuários</h2>
<table class="table table-bordered table-striped table-hover mt-3">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Email</th>
      <th>Telefone</th>
      <th>CPF</th>
      <th>Data de Nascimento</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $result = mysqli_query($conn, "SELECT * FROM usuario");
    while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td><?= $row['id_usuario'] ?></td>
      <td><?= $row['nome_usuario'] ?></td>
      <td><?= $row['email_usuario'] ?></td>
      <td><?= $row['fone_usuario'] ?></td>
      <td><?= $row['cpf_usuario'] ?></td>
      <td><?= $row['dt_nasc_usuario'] ?></td>
      <td>
        <a href="?page=usuario-editar&id=<?= $row['id_usuario'] ?>" class="btn btn-warning btn-sm">Editar</a>
        <form method="POST" action="?page=usuario-salvar" class="d-inline">
          <input type="hidden" name="acao" value="excluir">
          <input type="hidden" name="id" value="<?= $row['id_usuario'] ?>">
          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir?')">Excluir</button>
        </form>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
