<?php require '../app/views/layout/header.php'; ?>

<h2>Editar Usuário</h2>

<form method="POST">

    <label>Nome</label>
    <input type="text" name="nome" 
           value="<?= $usuario['nome'] ?>" required>

    <label>Email</label>
    <input type="email" name="email" 
           value="<?= $usuario['email'] ?>" required>

    <label>Senha (deixe em branco para não alterar)</label>
    <input type="password" name="senha">

    <button type="submit" class="btn">Atualizar</button>

</form>

<?php require '../app/views/layout/footer.php'; ?>
