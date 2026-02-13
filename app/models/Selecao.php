<?php

class Selecao {

    private $conn;
    private $table = "selecoes";

    public function __construct($db) {
        $this->conn = $db;
    }

    // LISTAR SELEÇÕES
    public function listar() {

        $query = "SELECT s.*, g.nome as grupo_nome
                  FROM {$this->table} s
                  JOIN grupos g ON s.grupo_id = g.id
                  ORDER BY s.nome";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // CADASTRAR SELEÇÃO
   public function cadastrar($nome, $continente, $grupo_id) {

    $query = "INSERT INTO {$this->table}
              (nome, continente, grupo_id, pontos, vitorias, empates, derrotas, gols_marcados, gols_sofridos)
              VALUES (?, ?, ?, 0, 0, 0, 0, 0, 0)";

    $stmt = $this->conn->prepare($query);

    return $stmt->execute([
        $nome,
        $continente,
        $grupo_id
    ]);
}

    // EXCLUIR SELEÇÃO
    public function excluir($id) {

        $query = "DELETE FROM {$this->table} WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        return $stmt->execute([$id]);
    }

    // ATUALIZAR ESTATÍSTICAS APÓS JOGO
   public function atualizarEstatisticas($id, $golsPro, $golsContra) {

    $pontos = 0;
    $vitoria = 0;
    $empate = 0;
    $derrota = 0;

    if ($golsPro > $golsContra) {
        $pontos = 3;
        $vitoria = 1;
    } elseif ($golsPro == $golsContra) {
        $pontos = 1;
        $empate = 1;
    } else {
        $derrota = 1;
    }

    $query = "UPDATE {$this->table}
              SET 
                pontos = pontos + ?,
                vitorias = vitorias + ?,
                empates = empates + ?,
                derrotas = derrotas + ?,
                gols_marcados = gols_marcados + ?,
                gols_sofridos = gols_sofridos + ?
              WHERE id = ?";

    $stmt = $this->conn->prepare($query);

    return $stmt->execute([
        $pontos,
        $vitoria,
        $empate,
        $derrota,
        $golsPro,
        $golsContra,
        $id
    ]);
}

public function buscarPorId($id) {

    $query = "SELECT * FROM {$this->table} WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function atualizar($id, $nome, $continente, $grupo_id) {

    $query = "UPDATE {$this->table}
              SET nome = ?, continente = ?, grupo_id = ?
              WHERE id = ?";

    $stmt = $this->conn->prepare($query);

    return $stmt->execute([
        $nome,
        $continente,
        $grupo_id,
        $id
    ]);
}


}
