<?php
class Jogo {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

public function listar() {

    $query = "SELECT j.*, 
                     m.nome as mandante,
                     v.nome as visitante
              FROM jogos j
              JOIN selecoes m ON j.mandante_id = m.id
              JOIN selecoes v ON j.visitante_id = v.id
              ORDER BY j.data_hora";

    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


    public function cadastrar($mandante, $visitante, $data, $estadio, $fase) {
        $stmt = $this->conn->prepare(
            "INSERT INTO jogos (mandante_id, visitante_id, data_hora, estadio, fase)
             VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->execute([$mandante, $visitante, $data, $estadio, $fase]);
    }

    public function registrarResultado($id, $gols_m, $gols_v) {
        $stmt = $this->conn->prepare(
            "UPDATE jogos SET gols_mandante=?, gols_visitante=? WHERE id=?"
        );
        $stmt->execute([$gols_m, $gols_v, $id]);
    }

    public function excluir($id){
    $stmt = $this->conn->prepare("DELETE FROM jogos WHERE id = ?");
    return $stmt->execute([$id]);
}

public function buscarPorId($id){
    $stmt = $this->conn->prepare("SELECT * FROM jogos WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
public function atualizar($id, $mandante, $visitante, $data, $estadio, $fase){

    $query = "UPDATE jogos 
              SET mandante_id=?, visitante_id=?, data_hora=?, estadio=?, fase=? 
              WHERE id=?";

    $stmt = $this->conn->prepare($query);

    return $stmt->execute([
        $mandante,
        $visitante,
        $data,
        $estadio,
        $fase,
        $id
    ]);
}

}
