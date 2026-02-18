<?php

class Usuario {

    private $conn;
    private $table = "usuarios";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function listar() {
        $query = "SELECT id, nome, email FROM {$this->table}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cadastrar($nome, $email, $senha) {
        $query = "INSERT INTO {$this->table}
                  (nome, email, senha)
                  VALUES (?, ?, ?)";

        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$nome, $email, $senha]);
    }

    public function buscarPorId($id) {
        $query = "SELECT * FROM {$this->table} WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizarComSenha($id, $nome, $email, $senha) {
        $query = "UPDATE {$this->table}
                  SET nome=?, email=?, senha=?
                  WHERE id=?";

        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$nome, $email, $senha, $id]);
    }

    public function atualizarSemSenha($id, $nome, $email) {
        $query = "UPDATE {$this->table}
                  SET nome=?, email=?
                  WHERE id=?";

        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$nome, $email, $id]);
    }

    public function excluir($id) {
        $query = "DELETE FROM {$this->table} WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
}
