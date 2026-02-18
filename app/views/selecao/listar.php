<?php require '../app/views/layout/header.php'; ?>

<div class="container">
<h2>Seleções</h2>

<a href="?controller=selecao&action=criar">Nova Seleção</a>

<table border="1">
<tr>
    <th>Nome</th>
    <th>Continente</th>
    <th>Grupo</th>
    <th>Ações</th>
</tr>

<?php foreach($selecoes as $s): ?>
<tr>
    <td><?= $s['nome'] ?></td>
    <td><?= $s['continente'] ?></td>
    <td><?= $s['grupo_nome'] ?></td>

    <td>
        <a href="?controller=selecao&action=editar&id=<?= $s['id'] ?>">
            Editar
        </a>

        |

        <a href="?controller=selecao&action=excluir&id=<?= $s['id'] ?>"
           onclick="return confirm('Tem certeza que deseja excluir?')">
            Excluir
        </a>
    </td>
</tr>
<?php endforeach; ?>

</table>
</div>
