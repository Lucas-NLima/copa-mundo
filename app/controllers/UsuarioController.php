<?php
require_once '../app/models/Usuario.php';

class UsuarioController {

    private $usuario;

    public function __construct($conn) {
        $this->usuario = new Usuario($conn);
    }

    public function listar() {
        $usuarios = $this->usuario->listar();
        require '../app/views/usuario/listar.php';
    }

    public function criar() {

        if ($_POST) {

            $senhaHash = password_hash($_POST['senha'], PASSWORD_DEFAULT);

            $this->usuario->cadastrar(
                $_POST['nome'],
                $_POST['email'],
                $senhaHash
            );

            header("Location: ?controller=usuario&action=listar");
            exit;
        }

        require '../app/views/usuario/criar.php';
    }

    public function editar() {

        $id = $_GET['id'];
        $usuario = $this->usuario->buscarPorId($id);

        if ($_POST) {

            if (!empty($_POST['senha'])) {

                $senhaHash = password_hash($_POST['senha'], PASSWORD_DEFAULT);

                $this->usuario->atualizarComSenha(
                    $id,
                    $_POST['nome'],
                    $_POST['email'],
                    $senhaHash
                );

            } else {

                $this->usuario->atualizarSemSenha(
                    $id,
                    $_POST['nome'],
                    $_POST['email']
                );
            }

            header("Location: ?controller=usuario&action=listar");
            exit;
        }

        require '../app/views/usuario/editar.php';
    }

    public function excluir() {
        $this->usuario->excluir($_GET['id']);
        header("Location: ?controller=usuario&action=listar");
        exit;
    }
}
