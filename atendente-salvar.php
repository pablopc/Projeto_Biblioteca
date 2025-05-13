<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
?>
<?php // atendente-salvar.php ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $acao = $_POST['acao'];
  if ($acao == 'excluir') {
    $stmt = $conn->prepare("DELETE FROM atendente WHERE id_atendente=?");
    $stmt->bind_param("i", $_POST['id']);
  } elseif ($acao == 'editar') {
    $stmt = $conn->prepare("UPDATE atendente SET nome_atendente=?, cpf_atendente=?, email_atendente=?, fone_atendente=? WHERE id_atendente=?");
    $stmt->bind_param("ssssi", $_POST['nome'], $_POST['cpf'], $_POST['email'], $_POST['fone'], $_POST['id']);
  } else {
    $stmt = $conn->prepare("INSERT INTO atendente (nome_atendente, cpf_atendente, email_atendente, fone_atendente) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $_POST['nome'], $_POST['cpf'], $_POST['email'], $_POST['fone']);
  }
  if ($stmt->execute()) {
    echo "<script>alert('Operação realizada com sucesso!');location.href='?page=atendente-listar';</script>";
  } else {
    echo "<script>alert('Erro: {$stmt->error}');location.href='?page=atendente-listar';</script>";
  }
}
?>
