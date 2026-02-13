

<h2>Editar Seleção</h2>

<form method="POST">

    Nome:
    <input type="text" name="nome" value="<?= $selecao['nome'] ?>" required>
    <br><br>

    Continente:
    <input type="text" name="continente" value="<?= $selecao['continente'] ?>" required>
    <br><br>

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

