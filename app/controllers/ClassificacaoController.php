<?php
class ClassificacaoController {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function listar() {

        $sql = "SELECT s.*, g.nome as grupo,
                (gols_marcados - gols_sofridos) as saldo
                FROM selecoes s
                JOIN grupos g ON s.grupo_id = g.id
                ORDER BY grupo ASC, pontos DESC, saldo DESC, gols_marcados DESC";

        $classificacao = $this->conn
                        ->query($sql)
                        ->fetchAll(PDO::FETCH_ASSOC);

        require '../app/views/classificacao/tabela.php';
    }
}
