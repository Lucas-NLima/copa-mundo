<?php require '../app/views/layout/header.php'; ?>

<h2>Novo Usuário</h2>

<form method="POST">

    <label>Nome</label>
    <input type="text" name="nome" required>

    <label>Idade</label>
    <input type="number" name="idade" required>

    <label>Cargo</label>
    <input type="text" name="cargo" required>

    <label>Seleção</label>
    <select name="selecao_id">
        <option value="">Selecione</option>
        <?php foreach($selecoes as $s): ?>
            <option value="<?= $s['id'] ?>">
                <?= $s['nome'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit" class="btn">Salvar</button>

</form>


