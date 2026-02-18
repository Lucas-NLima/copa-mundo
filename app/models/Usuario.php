<?php

class Usuario {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // 🔹 LISTAR
    public function listar() {
        $sql = "SELECT u.*, s.nome AS selecao_nome
                FROM usuarios u
                LEFT JOIN selecoes s ON u.selecao_id = s.id
                ORDER BY u.nome ASC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🔹 BUSCAR POR ID
    public function buscarPorId($id) {
        $sql = "SELECT * FROM usuarios WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 🔹 CADASTRAR
    public function cadastrar($nome, $idade, $cargo, $selecao_id) {
        $sql = "INSERT INTO usuarios (nome, idade, cargo, selecao_id)
                VALUES (?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$nome, $idade, $cargo, $selecao_id]);
    }

    // 🔹 ATUALIZAR
    public function atualizar($id, $nome, $idade, $cargo, $selecao_id) {
        $sql = "UPDATE usuarios
                SET nome = ?, idade = ?, cargo = ?, selecao_id = ?
                WHERE id = ?";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$nome, $idade, $cargo, $selecao_id, $id]);
    }

    // 🔹 EXCLUIR
    public function excluir($id) {
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}
