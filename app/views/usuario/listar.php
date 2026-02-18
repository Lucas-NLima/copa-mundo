<?php require '../app/views/layout/header.php'; ?>

<div class="container">

<h2>Usuários</h2>

<a href="?controller=usuario&action=criar" class="btn">+ Novo Usuário</a>

<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Idade</th>
            <th>Cargo</th>
            <th>Seleção</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
    <?php if(count($usuarios) > 0): ?>
        <?php foreach($usuarios as $u): ?>
        <tr>
            <td><?= htmlspecialchars($u['nome']) ?></td>
            <td><?= $u['idade'] ?></td>
            <td><?= htmlspecialchars($u['cargo']) ?></td>
            <td><?= $u['selecao_nome'] ?? '-' ?></td>

            <td>
                <a href="?controller=usuario&action=editar&id=<?= $u['id'] ?>" class="btn">
                    Editar
                </a>

                <a href="?controller=usuario&action=excluir&id=<?= $u['id'] ?>"
                   class="btn btn-danger"
                   onclick="return confirm('Tem certeza que deseja excluir?')">
                   Excluir
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="5">Nenhum usuário cadastrado.</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>

</div>


