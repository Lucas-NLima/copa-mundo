<h2>Cadastrar Usuário</h2>

<form method="POST">
    Nome: <input type="text" name="nome" required><br><br>
    Idade: <input type="number" name="idade" required><br><br>
    Cargo: <input type="text" name="cargo" required><br><br>

    Seleção:
    <select name="selecao_id" required>
        <?php foreach($selecoes as $s): ?>
            <option value="<?= $s['id'] ?>">
                <?= $s['nome'] ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Salvar</button>
</form>
