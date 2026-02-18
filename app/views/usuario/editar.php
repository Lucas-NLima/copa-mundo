<?php require '../app/views/layout/header.php'; ?>

<h2>Editar Usuário</h2>

<form method="POST">

    <label>Nome</label>
    <input type="text" name="nome"
           value="<?= htmlspecialchars($usuario['nome']) ?>" required>

    <label>Idade</label>
    <input type="number" name="idade"
           value="<?= $usuario['idade'] ?>" required>

    <label>Cargo</label>
    <input type="text" name="cargo"
           value="<?= htmlspecialchars($usuario['cargo']) ?>" required>

    <label>Seleção</label>
    <select name="selecao_id">
        <option value="">Selecione</option>
        <?php foreach($selecoes as $s): ?>
            <option value="<?= $s['id'] ?>"
                <?= $usuario['selecao_id'] == $s['id'] ? 'selected' : '' ?>>
                <?= $s['nome'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit" class="btn">Atualizar</button>

</form>


