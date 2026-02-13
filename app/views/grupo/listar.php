<?php require '../app/views/layout/header.php'; ?>


<h2>Grupos</h2>

<a href="?controller=grupo&action=criar">Novo Grupo</a>

<table border="1">
<tr>
    <th>Nome</th>
    <th>Ações</th>
</tr>

<?php foreach($grupos as $g): ?>
<tr>
    <td><?= $g['nome'] ?></td>
    <td>
        <a href="?controller=grupo&action=excluir&id=<?= $g['id'] ?>">
            Excluir
        </a>
    </td>
</tr>
<?php endforeach; ?>
</table>
