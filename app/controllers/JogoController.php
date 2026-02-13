<?php
require_once '../app/models/Jogo.php';
require_once '../app/models/Selecao.php';

class JogoController {

    private $jogo;
    private $selecao;
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
        $this->jogo = new Jogo($conn);
        $this->selecao = new Selecao($conn);
    }

    // LISTAR JOGOS
    public function listar() {

        $jogos = $this->jogo->listar();

        require '../app/views/jogo/listar.php';
    }

    // CRIAR JOGO
    public function criar() {

        $selecoes = $this->selecao->listar();

        if ($_POST) {

            $this->jogo->cadastrar(
                $_POST['mandante_id'],
                $_POST['visitante_id'],
                $_POST['data_hora'],
                $_POST['estadio'],
                $_POST['fase']
            );

            header("Location: ?controller=jogo&action=listar");
            exit;
        }

        require '../app/views/jogo/criar.php';
    }

    // REGISTRAR RESULTADO
    public function resultado() {

        if ($_POST) {

            $jogo_id = $_POST['id'];
            $gols_m = $_POST['gols_mandante'];
            $gols_v = $_POST['gols_visitante'];

            // Buscar dados do jogo
            $stmt = $this->conn->prepare("SELECT * FROM jogos WHERE id = ?");
            $stmt->execute([$jogo_id]);
            $jogo = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$jogo) {
                die("Jogo não encontrado.");
            }

            // Registrar placar
            $this->jogo->registrarResultado($jogo_id, $gols_m, $gols_v);

            // Atualizar estatísticas mandante
            $this->selecao->atualizarEstatisticas(
                $jogo['mandante_id'],
                $gols_m,
                $gols_v
            );

            // Atualizar estatísticas visitante
            $this->selecao->atualizarEstatisticas(
                $jogo['visitante_id'],
                $gols_v,
                $gols_m
            );

            header("Location: ?controller=jogo&action=listar");
            exit;
        }
    }
    public function excluir() {

    $this->jogo->excluir($_GET['id']);
    header("Location: ?controller=jogo&action=listar");
    exit;
}

public function editar() {

    $id = $_GET['id'];
    $jogo = $this->jogo->buscarPorId($id);
    $selecoes = $this->selecao->listar();

    if($_POST){
        $this->jogo->atualizar(
            $id,
            $_POST['mandante_id'],
            $_POST['visitante_id'],
            $_POST['data_hora'],
            $_POST['estadio'],
            $_POST['fase']
        );

        header("Location: ?controller=jogo&action=listar");
        exit;
    }

    require '../app/views/jogo/editar.php';
}


}
