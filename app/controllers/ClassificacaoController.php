<?php
require_once '../app/models/Classificacao.php';

class ClassificacaoController {

    private $classificacao;

    public function __construct($conn) {
        $this->classificacao = new Classificacao($conn);
    }

    public function tabela() {

        $grupo_id = $_GET['grupo'] ?? 1;

        $tabela = $this->classificacao->gerarTabela($grupo_id);

        require '../app/views/classificacao/tabela.php';
    }
}
