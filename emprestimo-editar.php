<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
?>
<?php // emprestimo-editar.php ?>
<?php
$livro_id = $_GET['livro_id'];
$usuario_id = $_GET['usuario_id'];
$result = mysqli_query($conn, "SELECT * FROM emprestimo WHERE livro_id_livro=$livro_id AND usuario_id_usuario=$usuario_id");
$emprestimo = mysqli_fetch_assoc($result);
?>
<h2>Editar Empréstimo</h2>
<form action="?page=emprestimo-salvar" method="POST">
  <input type="hidden" name="acao" value="editar">
  <input type="hidden" name="livro_id" value="<?= $livro_id ?>">
  <input type="hidden" name="usuario_id" value="<?= $usuario_id ?>">
  <div class="mb-3">
    <label class="form-label">Atendente ID:</label>
    <input type="number" name="atendente_id" value="<?= $emprestimo['atendente_id_atendente'] ?>" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Data Empréstimo:</label>
    <input type="date" name="data_emprestimo" value="<?= $emprestimo['data_emprestimo'] ?>" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Data Devolução:</label>
    <input type="date" name="data_devolucao" value="<?= $emprestimo['data_devolucao'] ?>" class="form-control">
  </div>
  <button type="submit" class="btn btn-success">Salvar</button>
  <a href="?page=emprestimo-listar" class="btn btn-secondary">Voltar</a>
</form>
