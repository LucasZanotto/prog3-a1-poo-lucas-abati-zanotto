<?php
require_once 'classes/Sessao.php';
require_once 'classes/Autenticador.php';

Sessao::iniciar();

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = $_POST['senha'] ?? '';
$lembrar = isset($_POST['lembrar']);

$usuario = Autenticador::autenticar($email, $senha);

if ($usuario) {
    Sessao::set('usuario', $usuario->getNome());
    if ($lembrar) {
        setcookie('email_usuario', $email, time() + 86400 * 30, '/');
    } else {
        setcookie('email_usuario', '', time() - 3600, '/');
    }
    header('Location: dashboard.php');
} else {
    Sessao::set('erro', 'Credenciais inválidas.');
    header('Location: login.php');
}

exit;
?>