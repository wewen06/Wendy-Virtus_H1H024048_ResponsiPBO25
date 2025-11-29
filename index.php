<?php
require_once "classes/Ivysaur.php";

$poke = new Ivysaur();
?>

<!DOCTYPE html>
<html>
<head>
    <title>PokéCare - Ivysaur</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>

<div class="container pokemon-card">
    <h1>PokéCare Center</h1>
    <h2>Informasi Pokémon</h2>

    <img src="https://i.etsystatic.com/31698537/r/il/6f1943/3672281510/il_570xN.3672281510_sx4e.jpg" class="pokemon-img">

    <table class="info-table">
        <tr>
            <th>Nama</th>
            <td><?= $poke->getName() ?></td>
        </tr>
        <tr>
            <th>Tipe</th>
            <td><?= $poke->getType() ?></td>
        </tr>
        <tr>
            <th>Level</th>
            <td><?= $poke->getLevel() ?></td>
        </tr>
        <tr>
            <th>HP</th>
            <td><?= $poke->getHp() ?></td>
        </tr>
        <tr>
            <th>Jurus Spesial</th>
            <td><?= $poke->specialMove() ?></td>
        </tr>
    </table>

    <a href="train.php" class="btn">Mulai Latihan</a>
    <a href="history.php" class="btn">Riwayat Latihan</a>
</div>

</body>
</html>
