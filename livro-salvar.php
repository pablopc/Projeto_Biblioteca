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
include_once 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $acao = $_POST['acao'] ?? 'cadastrar';
  if ($acao == 'excluir') {
    $stmt = $conn->prepare("DELETE FROM livro WHERE id_livro=?");
    $stmt->bind_param("i", $_POST['id']);
  } elseif ($acao == 'editar') {
    $stmt = $conn->prepare("UPDATE livro SET categoria_id_categoria=?, titulo_livro=?, autor_livro=?, editora_livro=?, edicao_livro=?, localidade_livro=?, ano_livro=? WHERE id_livro=?");
    $stmt->bind_param("isssssii", $_POST['categoria_id'], $_POST['titulo'], $_POST['autor'], $_POST['editora'], $_POST['edicao'], $_POST['localidade'], $_POST['ano'], $_POST['id']);
  } else {
    $stmt = $conn->prepare("INSERT INTO livro (categoria_id_categoria, titulo_livro, autor_livro, editora_livro, edicao_livro, localidade_livro, ano_livro) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssss", $_POST['categoria_id'], $_POST['titulo'], $_POST['autor'], $_POST['editora'], $_POST['edicao'], $_POST['localidade'], $_POST['ano']);
  }
  if ($stmt->execute()) {
    echo "<script>alert('Operação realizada com sucesso!');location.href='?page=livro-listar';</script>";
  } else {
    echo "<script>alert('Erro: {$stmt->error}');location.href='?page=livro-listar';</script>";
  }
}
?>
