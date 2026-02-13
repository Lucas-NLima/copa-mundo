<?php
require_once '../app/models/Usuario.php';
require_once '../app/models/Selecao.php';

class UsuarioController {

    private $usuario;
    private $selecao;

    public function __construct($conn) {
        $this->usuario = new Usuario($conn);
        $this->selecao = new Selecao($conn);
    }

    public function listar() {
        $usuarios = $this->usuario->listar();
        require '../app/views/usuario/listar.php';
    }

    public function criar() {
        $selecoes = $this->selecao->listar();

        if ($_POST) {
            $this->usuario->cadastrar(
                $_POST['nome'],
                $_POST['idade'],
                $_POST['cargo'],
                $_POST['selecao_id']
            );
            header("Location: ?controller=usuario&action=listar");
        }

        require '../app/views/usuario/criar.php';
    }

    public function excluir() {
        $this->usuario->excluir($_GET['id']);
        header("Location: ?controller=usuario&action=listar");
    }
}
