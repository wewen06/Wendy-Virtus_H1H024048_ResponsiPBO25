<?php
require_once "classes/HistoryManager.php";

$h = new HistoryManager();
$data = $h->readAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Latihan</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>

<div class="container">
    <h1>Riwayat Latihan Ivysaur</h1>

    <?php if (empty($data)): ?>
        <p>Belum ada data latihan.</p>
    <?php else: ?>
        <table>
            <tr>
                <th>Jenis Latihan</th>
                <th>Intensitas</th>
                <th>Level</th>
                <th>HP</th>
                <th>Jurus Spesial</th>
                <th>Waktu</th>
            </tr>

            <?php foreach ($data as $d): ?>
            <tr>
                <td><?= $d["trainingType"] ?></td>
                <td><?= $d["intensity"] ?></td>
                <td><?= $d["levelBefore"] ?> → <?= $d["levelAfter"] ?></td>
                <td><?= $d["hpBefore"] ?> → <?= $d["hpAfter"] ?></td>
                <td><?= $d["specialMove"] ?></td>
                <td><?= $d["timestamp"] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <a href="index.php" class="btn">Kembali</a>
</div>

</body>
</html>
