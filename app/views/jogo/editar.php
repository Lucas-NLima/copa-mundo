<?php require '../app/views/layout/header.php'; ?>


<h2>Editar Jogo</h2>

<form method="POST">

    <label>Seleção Casa:</label>
    <select name="casa" required>
        <?php foreach ($selecoes as $s): ?>
            <option value="<?= $s['id'] ?>"
                <?= $s['id'] == $jogo['selecao_casa_id'] ? 'selected' : '' ?>>
                <?= $s['nome'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>

    <label>Seleção Fora:</label>
    <select name="fora" required>
        <?php foreach ($selecoes as $s): ?>
            <option value="<?= $s['id'] ?>"
                <?= $s['id'] == $jogo['selecao_fora_id'] ? 'selected' : '' ?>>
                <?= $s['nome'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>

    <label>Data:</label>
    <input type="date" name="data"
        value="<?= date('Y-m-d', strtotime($jogo['data_jogo'])) ?>"
        required>

    <br><br>

    <label>Estádio:</label>
    <input type="text" name="estadio"
        value="<?= $jogo['estadio'] ?>" required>

    <br><br>

    <label>Fase:</label>
    <input type="text" name="fase"
        value="<?= $jogo['fase'] ?>" required>

    <br><br>

    <label>Gols Casa:</label>
    <input type="number" name="gols_casa"
        value="<?= $jogo['gols_casa'] ?>" required>

    <br><br>

    <label>Gols Fora:</label>
    <input type="number" name="gols_fora"
        value="<?= $jogo['gols_fora'] ?>" required>

    <br><br>

    <button type="submit">Atualizar</button>

</form>
