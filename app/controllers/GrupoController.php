<?php
require_once '../app/models/Grupo.php';

class GrupoController {

    private $grupo;

    public function __construct($conn) {
        $this->grupo = new Grupo($conn);
    }

    public function listar() {

        $grupos = $this->grupo->listar();

        require '../app/views/grupo/listar.php';
    }

    public function criar() {

        if($_POST){
            $this->grupo->cadastrar($_POST['nome']);
            header("Location: ?controller=grupo&action=listar");
            exit;
        }

        require '../app/views/grupo/criar.php';
    }

    public function excluir(){
        $this->grupo->excluir($_GET['id']);
        header("Location: ?controller=grupo&action=listar");
        exit;
    }

    public function editar(){

        $id = $_GET['id'];
        $grupo = $this->grupo->buscarPorId($id);

        if($_POST){
            $this->grupo->atualizar($id, $_POST['nome']);
            header("Location: ?controller=grupo&action=listar");
            exit;
        }

        require '../app/views/grupo/editar.php';
    }
}
