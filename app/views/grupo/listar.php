<?php require '../app/views/layout/header.php'; ?>

<h2>Grupos</h2>

<a href="?controller=grupo&action=criar" class="btn">Novo Grupo</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($grupos as $grupo): ?>
            <tr>
                <td><?= $grupo['id'] ?></td>
                <td><?= $grupo['nome'] ?></td>
                <td>
                    <a href="?controller=grupo&action=editar&id=<?= $grupo['id'] ?>" class="btn">Editar</a>
                    <a href="?controller=grupo&action=excluir&id=<?= $grupo['id'] ?>" 
                       class="btn btn-danger"
                       onclick="return confirm('Tem certeza que deseja excluir?')">
                       Excluir
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


