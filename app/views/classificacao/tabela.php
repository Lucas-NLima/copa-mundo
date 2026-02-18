<?php require '../app/views/layout/header.php'; ?>

<div class="container">
<div class="container">

    <h2>Classificação</h2>
    <h2>Classificação</h2>

    <!-- SELETOR DE GRUPO -->
    <form method="GET" style="margin-bottom:20px;">
        <input type="hidden" name="controller" value="classificacao">
        <input type="hidden" name="action" value="tabela">

        <label><strong>Selecione o Grupo:</strong></label>

        <select name="grupo" onchange="this.form.submit()">
            <option value="1" <?= ($_GET['grupo'] ?? 1) == 1 ? 'selected' : '' ?>>Grupo 1</option>
            <option value="2" <?= ($_GET['grupo'] ?? 1) == 2 ? 'selected' : '' ?>>Grupo 2</option>
            <option value="3" <?= ($_GET['grupo'] ?? 1) == 3 ? 'selected' : '' ?>>Grupo 3</option>
            <option value="4" <?= ($_GET['grupo'] ?? 1) == 4 ? 'selected' : '' ?>>Grupo 4</option>
        </select>
    </form>

    <!-- TABELA -->
    <table border="1" width="100%" cellpadding="8">
        <thead>
            <tr>
                <th>Seleção</th>
                <th>Pts</th>
                <th>J</th>
                <th>V</th>
                <th>E</th>
                <th>D</th>
                <th>GP</th>
                <th>GC</th>
                <th>SG</th>
            </tr>
        </thead>

        <tbody>
        <?php if(count($tabela) > 0): ?>

            <?php
usort($tabela, function($a, $b) {
    $saldoA = $a['gols_pro'] - $a['gols_contra'];
    $saldoB = $b['gols_pro'] - $b['gols_contra'];

    if ($a['pontos'] != $b['pontos']) {
        return $b['pontos'] - $a['pontos'];
    }

    if ($saldoA != $saldoB) {
        return $saldoB - $saldoA;
    }

    return $b['gols_pro'] - $a['gols_pro'];
});
?>

            <?php foreach ($tabela as $time): ?>
                <tr>
                    <td><?= htmlspecialchars($time['nome']) ?></td>
                    <td><strong><?= $time['pontos'] ?></strong></td>
                    <td><?= $time['jogos'] ?></td>
                    <td><?= $time['vitorias'] ?></td>
                    <td><?= $time['empates'] ?></td>
                    <td><?= $time['derrotas'] ?></td>
                    <td><?= $time['gols_pro'] ?></td>
                    <td><?= $time['gols_contra'] ?></td>
                    <td><?= $time['gols_pro'] - $time['gols_contra'] ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="9" style="text-align:center;">
                    Nenhum jogo registrado ainda para este grupo.
                </td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
    <!-- SELETOR DE GRUPO -->
    <form method="GET" style="margin-bottom:20px;">
        <input type="hidden" name="controller" value="classificacao">
        <input type="hidden" name="action" value="tabela">

        <label><strong>Selecione o Grupo:</strong></label>

        <select name="grupo" onchange="this.form.submit()">
            <option value="1" <?= ($_GET['grupo'] ?? 1) == 1 ? 'selected' : '' ?>>Grupo 1</option>
            <option value="2" <?= ($_GET['grupo'] ?? 1) == 2 ? 'selected' : '' ?>>Grupo 2</option>
            <option value="3" <?= ($_GET['grupo'] ?? 1) == 3 ? 'selected' : '' ?>>Grupo 3</option>
            <option value="4" <?= ($_GET['grupo'] ?? 1) == 4 ? 'selected' : '' ?>>Grupo 4</option>
        </select>
    </form>

    <!-- TABELA -->
    <table border="1" width="100%" cellpadding="8">
        <thead>
            <tr>
                <th>Seleção</th>
                <th>Pts</th>
                <th>J</th>
                <th>V</th>
                <th>E</th>
                <th>D</th>
                <th>GP</th>
                <th>GC</th>
                <th>SG</th>
            </tr>
        </thead>

        <tbody>
        <?php if(count($tabela) > 0): ?>

            <?php
usort($tabela, function($a, $b) {
    $saldoA = $a['gols_pro'] - $a['gols_contra'];
    $saldoB = $b['gols_pro'] - $b['gols_contra'];

    if ($a['pontos'] != $b['pontos']) {
        return $b['pontos'] - $a['pontos'];
    }

    if ($saldoA != $saldoB) {
        return $saldoB - $saldoA;
    }

    return $b['gols_pro'] - $a['gols_pro'];
});
?>

            <?php foreach ($tabela as $time): ?>
                <tr>
                    <td><?= htmlspecialchars($time['nome']) ?></td>
                    <td><strong><?= $time['pontos'] ?></strong></td>
                    <td><?= $time['jogos'] ?></td>
                    <td><?= $time['vitorias'] ?></td>
                    <td><?= $time['empates'] ?></td>
                    <td><?= $time['derrotas'] ?></td>
                    <td><?= $time['gols_pro'] ?></td>
                    <td><?= $time['gols_contra'] ?></td>
                    <td><?= $time['gols_pro'] - $time['gols_contra'] ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="9" style="text-align:center;">
                    Nenhum jogo registrado ainda para este grupo.
                </td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

</div>


