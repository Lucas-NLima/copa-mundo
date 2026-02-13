<?php
class Usuario {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function listar() {
        $sql = "SELECT u.*, s.nome as selecao 
                FROM usuarios u
                JOIN selecoes s ON u.selecao_id = s.id";
        return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cadastrar($nome, $idade, $cargo, $selecao_id) {
        $stmt = $this->conn->prepare(
            "INSERT INTO usuarios (nome, idade, cargo, selecao_id)
             VALUES (?, ?, ?, ?)"
        );
        $stmt->execute([$nome, $idade, $cargo, $selecao_id]);
    }

    public function excluir($id) {
        $stmt = $this->conn->prepare("DELETE FROM usuarios WHERE id=?");
        $stmt->execute([$id]);
    }
}
