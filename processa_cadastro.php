<?php

require_once 'classes/Sessao.php';
require_once 'classes/Usuario.php';
require_once 'classes/Autenticador.php';

Sessao::iniciar();

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = $_POST['senha'] ?? '';

if (!$nome || !$email || !$senha) {
    Sessao::set('erro', 'Preencha todos os campos.');
    header('Location: cadastro.php');
    exit;
}

$usuario = new Usuario($nome, $email, $senha);
Autenticador::registrarUsuario($usuario);

header('Location: login.php');
exit;

?>