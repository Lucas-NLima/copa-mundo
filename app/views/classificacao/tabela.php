<?php require '../app/views/layout/header.php'; ?>




<h2>Classificação</h2>

<table>
    <thead>
        <tr>
            <th>Seleção</th>
            <th>Pts</th>
            <th>J</th>
            <th>V</th>
            <th>E</th>
            <th>D</th>
            <th>GP</th>
            <th>GC</th>
            <th>SG</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tabela as $time): ?>
            <tr>
                <td><?= $time['nome'] ?></td>
                <td><?= $time['pontos'] ?></td>
                <td><?= $time['jogos'] ?></td>
                <td><?= $time['vitorias'] ?></td>
                <td><?= $time['empates'] ?></td>
                <td><?= $time['derrotas'] ?></td>
                <td><?= $time['gols_pro'] ?></td>
                <td><?= $time['gols_contra'] ?></td>
                <td><?= $time['gols_pro'] - $time['gols_contra'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>




