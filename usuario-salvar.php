<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
?>
?><?php // usuario-salvar.php ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $acao = $_POST['acao'];
  if ($acao == 'excluir') {
    $stmt = $conn->prepare("DELETE FROM usuario WHERE id_usuario=?");
    $stmt->bind_param("i", $_POST['id']);
  } elseif ($acao == 'editar') {
    $stmt = $conn->prepare("UPDATE usuario SET nome_usuario=?, email_usuario=?, fone_usuario=?, cpf_usuario=?, dt_nasc_usuario=? WHERE id_usuario=?");
    $stmt->bind_param("sssssi", $_POST['nome'], $_POST['email'], $_POST['fone'], $_POST['cpf'], $_POST['dt_nasc'], $_POST['id']);
  } else {
    $stmt = $conn->prepare("INSERT INTO usuario (nome_usuario, email_usuario, fone_usuario, cpf_usuario, dt_nasc_usuario) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $_POST['nome'], $_POST['email'], $_POST['fone'], $_POST['cpf'], $_POST['dt_nasc']);
  }
  if ($stmt->execute()) {
    echo "<script>alert('Operação realizada com sucesso!');location.href='?page=usuario-listar';</script>";
  } else {
    echo "<script>alert('Erro: {$stmt->error}');location.href='?page=usuario-listar';</script>";
  }
}
?>
