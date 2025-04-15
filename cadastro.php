<?php

    require_once 'classes/Sessao.php'; 
    Sessao::iniciar(); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
</head>
<body>
    <h2>Cadastro</h2>
    <?php if ($erro = Sessao::get('erro')): ?>
        <p style="color: red;"><?= $erro ?></p>
        <?php Sessao::set('erro', null); ?>
    <?php endif; ?>
    <form method="post" action="processa_cadastro.php">
        <input type="text" name="nome" placeholder="Nome" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="senha" placeholder="Senha" required><br>
        <button type="submit">Cadastrar</button>
    </form>
    <a href="login.php">Login</a>
</body>
</html>