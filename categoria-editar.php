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
include_once("config.php");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $stmt = $conn->prepare("SELECT * FROM categoria WHERE id_categoria = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($res->num_rows > 0) {
        $row = $res->fetch_object();
    } else {
        echo "<p>Categoria não encontrada.</p>";
        exit;
    }
} else {
    echo "<p>ID não informado.</p>";
    exit;
}
?>
<h1>Editar Categoria</h1>
<form action="?page=categoria-salvar" method="POST">
  <input type="hidden" name="acao" value="editar">
  <input type="hidden" name="id_categoria" value="<?= htmlspecialchars($row->id_categoria) ?>">
  <div class="mb-3">
    <label for="nome_categoria" class="form-label">Nome da Categoria</label>
    <input type="text" name="nome_categoria" id="nome_categoria" class="form-control" value="<?= htmlspecialchars($row->nome_categoria) ?>" required>
  </div>
  <button type="submit" class="btn btn-success">Salvar</button>
  <a href="?page=categoria-listar" class="btn btn-secondary">Voltar</a>
</form>
