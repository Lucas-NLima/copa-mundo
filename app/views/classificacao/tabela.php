<?php require '../app/views/layout/header.php'; ?>


<h2>Classificação Geral</h2>

<table border="1">
<tr>
    <th>Grupo</th>
    <th>Seleção</th>
    <th>Pontos</th>
    <th>Vitórias</th>
    <th>Empates</th>
    <th>Derrotas</th>
    <th>Saldo</th>
</tr>

<?php foreach($classificacao as $c): ?>
<tr>
    <td><?= $c['grupo'] ?></td>
    <td><?= $c['nome'] ?></td>
    <td><?= $c['pontos'] ?></td>
    <td><?= $c['vitorias'] ?></td>
    <td><?= $c['empates'] ?></td>
    <td><?= $c['derrotas'] ?></td>
    <td><?= $c['saldo'] ?></td>
</tr>
<?php endforeach; ?>
</table>
