<?php
class Grupo {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function listar() {
        return $this->conn
            ->query("SELECT * FROM grupos")
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cadastrar($nome) {
        $stmt = $this->conn->prepare("INSERT INTO grupos (nome) VALUES (?)");
        $stmt->execute([$nome]);
    }

    public function excluir($id) {
        $stmt = $this->conn->prepare("DELETE FROM grupos WHERE id=?");
        $stmt->execute([$id]);
    }
}
