<?php

class Classificacao {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function gerarTabela($grupo_id) {

        $query = "
        SELECT 
            s.id,
            s.nome,

            COUNT(j.id) as jogos,

            SUM(
                CASE 
                    WHEN (j.selecao_casa_id = s.id AND j.gols_casa > j.gols_fora)
                      OR (j.selecao_fora_id = s.id AND j.gols_fora > j.gols_casa)
                    THEN 1 ELSE 0
                END
            ) as vitorias,

            SUM(
                CASE 
                    WHEN j.gols_casa = j.gols_fora 
                    THEN 1 ELSE 0
                END
            ) as empates,

            SUM(
                CASE 
                    WHEN (j.selecao_casa_id = s.id AND j.gols_casa < j.gols_fora)
                      OR (j.selecao_fora_id = s.id AND j.gols_fora < j.gols_casa)
                    THEN 1 ELSE 0
                END
            ) as derrotas,

            SUM(
                CASE 
                    WHEN j.selecao_casa_id = s.id 
                    THEN j.gols_casa
                    WHEN j.selecao_fora_id = s.id
                    THEN j.gols_fora
                    ELSE 0
                END
            ) as gols_pro,

            SUM(
                CASE 
                    WHEN j.selecao_casa_id = s.id 
                    THEN j.gols_fora
                    WHEN j.selecao_fora_id = s.id
                    THEN j.gols_casa
                    ELSE 0
                END
            ) as gols_contra,

            SUM(
                CASE 
                    WHEN (j.selecao_casa_id = s.id AND j.gols_casa > j.gols_fora)
                      OR (j.selecao_fora_id = s.id AND j.gols_fora > j.gols_casa)
                    THEN 3
                    WHEN j.gols_casa = j.gols_fora
                    THEN 1
                    ELSE 0
                END
            ) as pontos

        FROM selecoes s

        LEFT JOIN jogos j 
            ON (s.id = j.selecao_casa_id 
            OR s.id = j.selecao_fora_id)

        WHERE s.grupo_id = ?

        GROUP BY s.id

        ORDER BY pontos DESC
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute([$grupo_id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}