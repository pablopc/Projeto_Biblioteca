<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
?>
<?php // emprestimo-cadastrar.php ?>
<h2>Cadastrar Empréstimo</h2>
<form action="?page=emprestimo-salvar" method="POST" class="mt-3">
  <div class="mb-3">
    <label class="form-label">Livro:</label>
    <select name="livro_id" class="form-select" required>
      <option value="">Selecione um livro</option>
      <?php
      $livros = mysqli_query($conn, "SELECT id_livro, titulo_livro FROM livro");
      while($livro = mysqli_fetch_assoc($livros)) {
        echo "<option value='{$livro['id_livro']}'>{$livro['titulo_livro']}</option>";
      }
      ?>
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label">Usuário:</label>
    <select name="usuario_id" class="form-select" required>
      <option value="">Selecione um usuário</option>
      <?php
      $usuarios = mysqli_query($conn, "SELECT id_usuario, nome_usuario FROM usuario");
      while($usuario = mysqli_fetch_assoc($usuarios)) {
        echo "<option value='{$usuario['id_usuario']}'>{$usuario['nome_usuario']}</option>";
      }
      ?>
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label">Atendente:</label>
    <select name="atendente_id" class="form-select" required>
      <option value="">Selecione um atendente</option>
      <?php
      $atendentes = mysqli_query($conn, "SELECT id_atendente, nome_atendente FROM atendente");
      while($atendente = mysqli_fetch_assoc($atendentes)) {
        echo "<option value='{$atendente['id_atendente']}'>{$atendente['nome_atendente']}</option>";
      }
      ?>
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label">Data do Empréstimo:</label>
    <input type="date" name="data_emprestimo" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Data da Devolução:</label>
    <input type="date" name="data_devolucao" class="form-control">
  </div>
  <button type="submit" class="btn btn-success">Salvar</button>
  <a href="?page=emprestimo-listar" class="btn btn-secondary">Voltar</a>
</form>
