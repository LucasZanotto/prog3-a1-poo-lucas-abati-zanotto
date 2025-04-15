<?php

require_once 'classes/Sessao.php';

Sessao::iniciar();

if (!Sessao::get('usuario')) {
    header('Location: login.php');
    exit;
}

$usuarioNome = Sessao::get('usuario');
$emailLembrado = $_COOKIE['email_usuario'] ?? 'Não lembrado';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Bem-vindo, <?= htmlspecialchars($usuarioNome) ?>!</h2>
    <p>Email lembrado: <?= htmlspecialchars($emailLembrado) ?></p>
    <a href="logout.php">Sair</a>
</body>
</html>