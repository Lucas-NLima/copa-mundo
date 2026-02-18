<?php require '../app/views/layout/header.php'; ?>

<form method="POST">

    <label>Seleção Casa:</label>
    <select name="casa" required>
        <?php foreach ($selecoes as $s): ?>
            <option value="<?= $s['id'] ?>">
                <?= $s['nome'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Seleção Fora:</label>
    <select name="fora" required>
        <?php foreach ($selecoes as $s): ?>
            <option value="<?= $s['id'] ?>">
                <?= $s['nome'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Data:</label>
    <input type="date" name="data" required>

    <label>Estádio:</label>
    <input type="text" name="estadio">

    <label>Fase:</label>
    <input type="text" name="fase">

    <label>Gols Casa:</label>
    <input type="number" name="gols_casa" required>

    <label>Gols Fora:</label>
    <input type="number" name="gols_fora" required>

    <button type="submit">Registrar</button>

</form>

