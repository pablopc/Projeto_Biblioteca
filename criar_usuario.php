<?php
include 'config.php';

$nome = "Admin";
$email = "admin@biblioteca.com";
$senha = password_hash("123456", PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nome, $email, $senha);

if ($stmt->execute()) {
    echo "Usuário criado com sucesso!";
} else {
    echo "Erro ao criar usuário.";
}
?>