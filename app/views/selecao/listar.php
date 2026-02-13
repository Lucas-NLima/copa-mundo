
<?php require '../app/views/layout/header.php'; ?>

<div class="container">
<h2>Seleções</h2>

<a href="?controller=selecao&action=criar">Nova Seleção</a>

<table border="1">
<tr>
    <th>Nome</th>
    <th>Continente</th>
    <th>Ações</th>
</tr>

<?php foreach($selecoes as $s): ?>
<tr>
    <td><?= $s['nome'] ?></td>
    <td><?= $s['continente'] ?></td>
    <td>
        <a href="?controller=selecao&action=excluir&id=<?= $s['id'] ?>">
            Excluir
        </a>
         <a href="?controller=selecao&action=editar&id=<?= $s['id'] ?>">Editar</a>
    </td>
 


</tr>
<?php endforeach; ?>
</table>
</div>  

