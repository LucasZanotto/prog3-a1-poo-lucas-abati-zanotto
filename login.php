<?php

    require_once 'classes/Sessao.php'; 
 Sessao::iniciar(); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
        <input type="email" name="email" placeholder="Email" required 
               value="<?= htmlspecialchars($_COOKIE['email_usuario'] ?? '') ?>"><br>
        <input type="password" name="senha" placeholder="Senha" required><br>
        <label>
            <input type="checkbox" name="lembrar"> 
            Lembrar email
        </label><br>
        <button type="submit">Entrar</button>
    </form>
    <a href="cadastro.php">Cadastre-se</a>
</body>
</html>