<?php
require_once '../app/models/Usuario.php';
require_once '../app/models/Selecao.php';

class UsuarioController {

    private $usuario;
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
        $this->usuario = new Usuario($conn);
    }

    // 🔹 LISTAR
    public function listar() {
        $usuarios = $this->usuario->listar();
        require '../app/views/usuario/listar.php';
    }

    // 🔹 CRIAR
    public function criar() {

        $selecaoModel = new Selecao($this->conn);
        $selecoes = $selecaoModel->listar();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $this->usuario->cadastrar(
                $_POST['nome'],
                $_POST['idade'],
                $_POST['cargo'],
                $_POST['selecao_id']
            );

            header("Location: ?controller=usuario&action=listar");
            exit;
        }

        require '../app/views/usuario/criar.php';
    }

    // 🔹 EDITAR
    public function editar() {

        $id = $_GET['id'];
        $usuario = $this->usuario->buscarPorId($id);

        $selecaoModel = new Selecao($this->conn);
        $selecoes = $selecaoModel->listar();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $this->usuario->atualizar(
                $id,
                $_POST['nome'],
                $_POST['idade'],
                $_POST['cargo'],
                $_POST['selecao_id']
            );

            header("Location: ?controller=usuario&action=listar");
            exit;
        }

        require '../app/views/usuario/editar.php';
    }

    // 🔹 EXCLUIR
    public function excluir() {
        $this->usuario->excluir($_GET['id']);
        header("Location: ?controller=usuario&action=listar");
        exit;
    }
}
