<?php require '../app/views/layout/header.php'; ?>

<h2>Cadastrar Grupo</h2>

<form method="POST">
    Nome do Grupo:
    <input type="text" name="nome" required>
    <button type="submit">Salvar</button>
</form>

<a href="?controller=grupo&action=listar">Voltar</a>
<?php require '../app/views/layout/footer.php'; ?>
