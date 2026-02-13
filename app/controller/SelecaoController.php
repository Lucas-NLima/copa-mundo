<?php
public function criar() {

    require_once '../app/models/Grupo.php';
    $grupoModel = new Grupo($this->model->conn ?? null);
    
    $conn = Database::conectar();
    $grupoModel = new Grupo($conn);
    $grupos = $grupoModel->listar();

    if ($_POST) {
        $this->model->cadastrar(
            $_POST['nome'],
            $_POST['continente'],
            $_POST['grupo_id']
        );
        header("Location: ?controller=selecao&action=listar");
    }

    require '../app/views/selecao/criar.php';
}

?>