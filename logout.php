<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="2;url=login.php">
    <title>Logout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow p-5 text-center">
        <h4>Você saiu com sucesso!</h4>
        <p>Redirecionando para o login...</p>
    </div>
</body>
</html>
