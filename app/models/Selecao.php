<?php

class Selecao {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // 🔹 LISTAR TODAS

  public function listar() {
    $sql = "SELECT s.*, g.nome AS grupo_nome
            FROM selecoes s
            LEFT JOIN grupos g ON s.grupo_id = g.id";

    return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}




    // 🔹 LISTAR POR GRUPO
    public function listarPorGrupo($grupo_id) {
        $sql = "SELECT * FROM selecoes 
                WHERE grupo_id = ?
                ORDER BY nome";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$grupo_id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🔹 BUSCAR POR ID
    public function buscarPorId($id) {
        $sql = "SELECT * FROM selecoes WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 🔹 CADASTRAR
    public function cadastrar($nome, $grupo_id, $continente) {
        $sql = "INSERT INTO selecoes (nome, grupo_id, continente)
                VALUES (?, ?, ?)";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$nome, $grupo_id, $continente]);
    }

    // 🔹 ATUALIZAR
    public function atualizar($id, $nome, $grupo_id, $continente) {
        $sql = "UPDATE selecoes 
                SET nome = ?, grupo_id = ?, continente = ?
                WHERE id = ?";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$nome, $grupo_id, $continente, $id]);
    }

    // 🔹 EXCLUIR
    public function excluir($id) {
        $sql = "DELETE FROM selecoes WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}
