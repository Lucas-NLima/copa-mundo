<?php
class Grupo {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // 🔹 BUSCAR POR ID
public function buscarPorId($id) {
    $sql = "SELECT * FROM grupos WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// 🔹 ATUALIZAR
public function atualizar($id, $nome) {
    $sql = "UPDATE grupos SET nome = ? WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$nome, $id]);
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
