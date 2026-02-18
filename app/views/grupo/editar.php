<?php require '../app/views/layout/header.php'; ?>

<h2>Editar Grupo</h2>

<form method="POST">
    <label>Nome do Grupo</label>
    <input type="text" name="nome" value="<?= $grupo['nome'] ?>" required>

    <button type="submit" class="btn">Atualizar</button>
</form>


