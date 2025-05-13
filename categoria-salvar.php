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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST["acao"];
    if ($acao == "cadastrar") {
        $nome = $_POST["nome_categoria"];
        $stmt = $conn->prepare("INSERT INTO categoria (nome_categoria) VALUES (?)");
        $stmt->bind_param("s", $nome);
    } elseif ($acao == "editar") {
        $id = $_POST["id_categoria"];
        $nome = $_POST["nome_categoria"];
        $stmt = $conn->prepare("UPDATE categoria SET nome_categoria=? WHERE id_categoria=?");
        $stmt->bind_param("si", $nome, $id);
    } elseif ($acao == "excluir") {
        $id = $_POST["id_categoria"];
        $stmt = $conn->prepare("DELETE FROM categoria WHERE id_categoria=?");
        $stmt->bind_param("i", $id);
    }

    if ($stmt->execute()) {
        echo "<script>alert('Operação realizada com sucesso!');location.href='?page=categoria-listar';</script>";
    } else {
        echo "<script>alert('Erro: {$stmt->error}');location.href='?page=categoria-listar';</script>";
    }
}
?>
