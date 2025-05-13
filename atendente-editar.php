<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
?>
<?php // atendente-editar.php ?>
<?php
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM atendente WHERE id_atendente=$id");
$atendente = mysqli_fetch_assoc($result);
?>
<h2>Editar Atendente</h2>
<form action="?page=atendente-salvar" method="POST">
  <input type="hidden" name="acao" value="editar">
  <input type="hidden" name="id" value="<?= $atendente['id_atendente'] ?>">
  <div class="mb-3">
    <label class="form-label">Nome:</label>
    <input type="text" name="nome" value="<?= $atendente['nome_atendente'] ?>" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">CPF:</label>
    <input type="text" name="cpf" value="<?= $atendente['cpf_atendente'] ?>" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Email:</label>
    <input type="email" name="email" value="<?= $atendente['email_atendente'] ?>" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Telefone:</label>
    <input type="text" name="fone" value="<?= $atendente['fone_atendente'] ?>" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-success">Salvar</button>
  <a href="?page=atendente-listar" class="btn btn-secondary">Voltar</a>
</form>
