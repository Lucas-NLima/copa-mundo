<?php
require_once '../app/models/Jogo.php';
require_once '../app/models/Selecao.php';

class JogoController {

    private $jogo;
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;          // salva a conexão
        $this->jogo = new Jogo($conn);
    }

    // 🔹 LISTAR JOGOS
    public function listar() {
        $jogos = $this->jogo->listar();
        require '../app/views/jogo/listar.php';
    }

    // 🔹 CRIAR JOGO
    public function criar() {

        // Busca todas as seleções para os selects
        $selecaoModel = new Selecao($this->conn);
        $selecoes = $selecaoModel->listar();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $this->jogo->cadastrar(
                $_POST['casa'],
                $_POST['fora'],
                $_POST['data'],
                $_POST['estadio'],
                $_POST['fase'],
                $_POST['gols_casa'],
                $_POST['gols_fora']
            );

            header("Location: ?controller=jogo&action=listar");
            exit;
        }

        require '../app/views/jogo/criar.php';
    }

    // 🔹 EDITAR JOGO
    public function editar() {

        $id = $_GET['id'];
        $jogo = $this->jogo->buscarPorId($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $this->jogo->atualizar(
                $id,
                $_POST['casa'],
                $_POST['fora'],
                $_POST['data'],
                $_POST['estadio'],
                $_POST['fase'],
                $_POST['gols_casa'],
                $_POST['gols_fora']
            );

            header("Location: ?controller=jogo&action=listar");
            exit;
        }

        $selecaoModel = new Selecao($this->conn);
        $selecoes = $selecaoModel->listar();

        require '../app/views/jogo/editar.php';
    }

    // 🔹 EXCLUIR JOGO
    public function excluir() {
        $this->jogo->excluir($_GET['id']);
        header("Location: ?controller=jogo&action=listar");
        exit;
    }
}
