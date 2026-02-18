<?php
require_once '../app/models/Selecao.php';
require_once '../app/models/Grupo.php';

class SelecaoController {

    private $selecao;
    private $grupo;

    public function __construct($conn) {
        $this->selecao = new Selecao($conn);
        $this->grupo = new Grupo($conn);
    }

    // LISTAR SELEÇÕES
    public function listar() {

        $selecoes = $this->selecao->listar();

        require '../app/views/selecao/listar.php';
    }

    // CRIAR SELEÇÃO
    public function criar() {

        $grupos = $this->grupo->listar();

        if ($_POST) {

            $this->selecao->cadastrar(
    $_POST['nome'],
    $_POST['grupo_id'],
    $_POST['continente']
);


            header("Location: ?controller=selecao&action=listar");
            exit;
        }

        require '../app/views/selecao/criar.php';
    }

    // EXCLUIR SELEÇÃO
    public function excluir() {

        if (isset($_GET['id'])) {
            $this->selecao->excluir($_GET['id']);
        }

        header("Location: ?controller=selecao&action=listar");
        exit;
    }

    public function editar() {

    if (!isset($_GET['id'])) {
        header("Location: ?controller=selecao&action=listar");
        exit;
    }

    $id = $_GET['id'];

    $selecao = $this->selecao->buscarPorId($id);
    $grupos = $this->grupo->listar();

    if ($_POST) {

        $this->selecao->atualizar(
    $id,
    $_POST['nome'],
    $_POST['grupo_id'],
    $_POST['continente']
);


        header("Location: ?controller=selecao&action=listar");
        exit;
    }

    require '../app/views/selecao/editar.php';
}

}
