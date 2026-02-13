<?php require '../app/views/layout/header.php'; ?>


<h2>Jogos</h2>

<a href="?controller=jogo&action=criar">Novo Jogo</a>

<br><br>

<table border="1" cellpadding="8">
<tr>
    <th>Confronto</th>
    <th>Data</th>
    <th>Estádio</th>
    <th>Fase</th>
    <th>Placar</th>
    <th>Ações</th>
</tr>

<?php foreach($jogos as $j): ?>
<tr>

    <td>
        <strong><?= $j['mandante_nome'] ?></strong>
        x
        <strong><?= $j['visitante_nome'] ?></strong>
    </td>

    <td><?= date("d/m/Y H:i", strtotime($j['data_hora'])) ?></td>

    <td><?= $j['estadio'] ?></td>

    <td><?= $j['fase'] ?></td>

    <td>
        <?php if($j['gols_mandante'] !== null): ?>
            <strong>
                <?= $j['gols_mandante'] ?> x <?= $j['gols_visitante'] ?>
            </strong>
        <?php else: ?>
            -
        <?php endif; ?>
    </td>

    <td>

        <?php if($j['gols_mandante'] === null): ?>
            <form method="POST" action="?controller=jogo&action=resultado" style="margin-bottom:5px;">
                <input type="hidden" name="id" value="<?= $j['id'] ?>">
                <input type="number" name="gols_mandante" placeholder="Mandante" required style="width:60px;">
                <input type="number" name="gols_visitante" placeholder="Visitante" required style="width:60px;">
                <button type="submit">Registrar</button>
            </form>
        <?php else: ?>
            Resultado registrado
            <br>
        <?php endif; ?>

        <a href="?controller=jogo&action=editar&id=<?= $j['id'] ?>">Editar</a>
        |
        <a href="?controller=jogo&action=excluir&id=<?= $j['id'] ?>" 
           onclick="return confirm('Tem certeza que deseja excluir este jogo?')">
           Excluir
        </a>

    </td>

</tr>
<?php endforeach; ?>

</table>
