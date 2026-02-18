<?php

class Jogo {

    private $conn;
    private $table = "jogos";

    public function __construct($db) {
        $this->conn = $db;
    }

public function listar() {

    $sql = "SELECT j.*, 
                   s1.nome AS mandante_nome,
                   s2.nome AS visitante_nome
            FROM jogos j
            JOIN selecoes s1 ON j.selecao_casa_id = s1.id
            JOIN selecoes s2 ON j.selecao_fora_id = s2.id
            ORDER BY j.data_jogo ASC";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



    public function cadastrar($casa, $fora, $data, $estadio, $fase, $golsCasa, $golsFora) {

    $sql = "INSERT INTO jogos 
            (selecao_casa_id, selecao_fora_id, data_jogo, estadio, fase, gols_casa, gols_fora) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$casa, $fora, $data, $estadio, $fase, $golsCasa, $golsFora]);
}

    public function buscarPorId($id) {
        $query = "SELECT * FROM {$this->table} WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

   public function atualizar($id, $casa, $fora, $data, $estadio, $fase, $golsCasa, $golsFora) {

    $sql = "UPDATE jogos SET
                selecao_casa_id = ?,
                selecao_fora_id = ?,
                data_jogo = ?,
                estadio = ?,
                fase = ?,
                gols_casa = ?,
                gols_fora = ?
            WHERE id = ?";

    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([
        $casa,
        $fora,
        $data,
        $estadio,
        $fase,
        $golsCasa,
        $golsFora,
        $id
    ]);
}


    public function excluir($id) {
        $query = "DELETE FROM {$this->table} WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
}
