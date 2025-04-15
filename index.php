<?php

require_once 'classes/Sessao.php';

Sessao::iniciar();

if (Sessao::get('usuario')) {
    header("Location: dashboard.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Registro de Usuários</title>
</head>
<body>
    <h2>Login</h2>
    
    <?php
        if ($erro = Sessao::get('erro')): 
    ?>

    <p style="color: red;">
        <?= $erro ?>
    </p>

    <?php
        Sessao::set('erro', null); 
    ?>

    <?php
        endif; 
    ?>

    <form method="post" action="processa_login.php">
        <label>Email:</label><br>
        <input type="email" name="email" required 
               value="<?= htmlspecialchars($_COOKIE['email_usuario'] ?? '') ?>"><br><br>

        <label>Senha:</label><br>
        <input type="password" name="senha" required><br><br>

        <label>
            <input type="checkbox" name="lembrar" value="1">
            Lembrar meu Email
        </label><br><br>

        <button type="submit">Entrar</button>
    </form>

    <p>Precisar criar uma conta? <a href="cadastro.php">Clique aqui</a></p>
</body>
</html>