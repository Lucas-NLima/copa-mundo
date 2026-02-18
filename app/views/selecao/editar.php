<?php require '../app/views/layout/header.php'; ?>

<h2>Editar Seleção</h2>

<form method="POST">

    Nome:
    <input type="text" name="nome" value="<?= $selecao['nome'] ?>" required>
    <br><br>

   <label>Continente:</label>
<select name="continente" required>
    <option value="América do Sul" <?= $selecao['continente']=='América do Sul'?'selected':'' ?>>América do Sul</option>
    <option value="América do Norte" <?= $selecao['continente']=='América do Norte'?'selected':'' ?>>América do Norte</option>
    <option value="Europa" <?= $selecao['continente']=='Europa'?'selected':'' ?>>Europa</option>
    <option value="África" <?= $selecao['continente']=='África'?'selected':'' ?>>África</option>
    <option value="Ásia" <?= $selecao['continente']=='Ásia'?'selected':'' ?>>Ásia</option>
    <option value="Oceania" <?= $selecao['continente']=='Oceania'?'selected':'' ?>>Oceania</option>
</select>


    Grupo:
    <select name="grupo_id">
        <?php foreach($grupos as $grupo): ?>
            <option value="<?= $grupo['id'] ?>"
                <?= $grupo['id'] == $selecao['grupo_id'] ? 'selected' : '' ?>>
                <?= $grupo['nome'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>
    <button type="submit">Atualizar</button>

</form>

