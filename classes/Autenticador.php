<?php

require_once 'Usuario.php';

class Autenticador {
    public static function registrarUsuario(Usuario $usuario) {

        Sessao::iniciar();
        $_SESSION['usuarios'][] = serialize($usuario);
    }

    public static function autenticar($email, $senha) {

        Sessao::iniciar();
        if (!empty($_SESSION['usuarios'])) {
            foreach ($_SESSION['usuarios'] as $usuarioSerializado) {
                $usuario = unserialize($usuarioSerializado);
                if ($usuario->getEmail() === $email && $usuario->verificarSenha($senha)) {
                    return $usuario;
                }
            }
        }

        return null;
    }
}

?>