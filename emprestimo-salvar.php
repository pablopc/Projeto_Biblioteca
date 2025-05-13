<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
?>
<?php // emprestimo-salvar.php ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $acao = $_POST['acao'] ?? 'cadastrar';

  if ($acao === 'excluir') {
    $stmt = $conn->prepare("DELETE FROM emprestimo WHERE livro_id_livro=? AND usuario_id_usuario=?");
    $stmt->bind_param("ii", $_POST['livro_id'], $_POST['usuario_id']);
  } elseif ($acao === 'editar') {
    $stmt = $conn->prepare("UPDATE emprestimo SET atendente_id_atendente=?, data_emprestimo=?, data_devolucao=? WHERE livro_id_livro=? AND usuario_id_usuario=?");
    $stmt->bind_param("issii", $_POST['atendente_id'], $_POST['data_emprestimo'], $_POST['data_devolucao'], $_POST['livro_id'], $_POST['usuario_id']);
  } else {
    $stmt = $conn->prepare("INSERT INTO emprestimo (livro_id_livro, usuario_id_usuario, atendente_id_atendente, data_emprestimo, data_devolucao) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iiiss", $_POST['livro_id'], $_POST['usuario_id'], $_POST['atendente_id'], $_POST['data_emprestimo'], $_POST['data_devolucao']);
  }

  if ($stmt->execute()) {
    echo "<script>alert('Operação realizada com sucesso!');location.href='?page=emprestimo-listar';</script>";
  } else {
    echo "<script>alert('Erro: {$stmt->error}');location.href='?page=emprestimo-listar';</script>";
  }
}
?>
