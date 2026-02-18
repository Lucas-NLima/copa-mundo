<?php require '../app/views/layout/header.php'; ?>

<h2>Editar Jogo</h2>

<form method="POST">

    <label>Confronto</label>
    <input type="text" name="confronto" 
           value="<?= $jogo['confronto'] ?>" required>

    <label>Data</label>
    <input type="date" name="data" 
           value="<?= $jogo['data'] ?>" required>

    <label>Estádio</label>
    <input type="text" name="estadio" 
           value="<?= $jogo['estadio'] ?>" required>

    <label>Fase</label>
    <input type="text" name="fase" 
           value="<?= $jogo['fase'] ?>" required>

    <label>Placar</label>
    <input type="text" name="placar" 
           value="<?= $jogo['placar'] ?>">

    <button type="submit" class="btn">Atualizar</button>

</form>

<?php require '../app/views/layout/footer.php'; ?>
