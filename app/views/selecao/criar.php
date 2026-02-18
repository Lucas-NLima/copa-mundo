<?php require '../app/views/layout/header.php'; ?>

<h2>Cadastrar Seleção</h2>

<form method="POST">
    Nome: <input type="text" name="nome" required><br><br>
    <label>Continente:</label>
<select name="continente" required>
    <option value="América do Sul">América do Sul</option>
    <option value="América do Norte">América do Norte</option>
    <option value="Europa">Europa</option>
    <option value="África">África</option>
    <option value="Ásia">Ásia</option>
    <option value="Oceania">Oceania</option>
</select>

    Grupo ID: <input type="number" name="grupo_id" required><br><br>

    <button type="submit">Salvar</button>
</form>

<a href="?controller=selecao&action=listar">Voltar</a>

