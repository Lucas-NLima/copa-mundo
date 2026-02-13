<?php require '../app/views/layout/header.php'; ?>

    
<div class="container">
<h2>Usuários</h2>

<a href="?controller=usuario&action=criar">Novo Usuário</a>

<table border="1">
<tr>
    <th>Nome</th>
    <th>Idade</th>
    <th>Cargo</th>
    <th>Seleção</th>
    <th>Ações</th>
</tr>

<?php foreach($usuarios as $u): ?>
<tr>
    <td><?= $u['nome'] ?></td>
    <td><?= $u['idade'] ?></td>
    <td><?= $u['cargo'] ?></td>
    <td><?= $u['selecao'] ?></td>
    <td>
        <a href="?controller=usuario&action=excluir&id=<?= $u['id'] ?>">
            Excluir
        </a>
    </td>
</tr>
<?php endforeach; ?>
</table>

</div>
