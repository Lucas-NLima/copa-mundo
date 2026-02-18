<?php require '../app/views/layout/header.php'; ?>

<h2>Novo Usuário</h2>

<form method="POST">

    <label>Nome</label>
    <input type="text" name="nome" required>

    <label>Email</label>
    <input type="email" name="email" required>

    <label>Senha</label>
    <input type="password" name="senha" required>

    <button type="submit" class="btn">Salvar</button>

</form>

<?php require '../app/views/layout/footer.php'; ?>
