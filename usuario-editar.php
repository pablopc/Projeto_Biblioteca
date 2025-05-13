<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
?>
?><?php // usuario-editar.php ?>
<?php
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM usuario WHERE id_usuario=$id");
$usuario = mysqli_fetch_assoc($result);
?>
<h2>Editar Usuário</h2>
<form action="?page=usuario-salvar" method="POST">
  <input type="hidden" name="acao" value="editar">
  <input type="hidden" name="id" value="<?= $usuario['id_usuario'] ?>">
  <div class="mb-3">
    <label class="form-label">Nome:</label>
    <input type="text" name="nome" value="<?= $usuario['nome_usuario'] ?>" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Email:</label>
    <input type="email" name="email" value="<?= $usuario['email_usuario'] ?>" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Telefone:</label>
    <input type="text" name="fone" value="<?= $usuario['fone_usuario'] ?>" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">CPF:</label>
    <input type="text" name="cpf" value="<?= $usuario['cpf_usuario'] ?>" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Data de Nascimento:</label>
    <input type="date" name="dt_nasc" value="<?= $usuario['dt_nasc_usuario'] ?>" class="form-control">
  </div>
  <button type="submit" class="btn btn-success">Salvar</button>
  <a href="?page=usuario-listar" class="btn btn-secondary">Voltar</a>
</form>
