<?php
require_once "classes/Ivysaur.php";
require_once "classes/HistoryManager.php";
require_once "classes/Trainer.php";

$pokemon = new Ivysaur();
$history = new HistoryManager();
$trainer = new Trainer("Wendy", $pokemon, $history);

$msg = "";
$session = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jenis = $_POST["jenis"];
    $intensitas = (int)$_POST["intensitas"];
    $session = $trainer->doTraining($jenis, $intensitas);
    $msg = "Latihan berhasil! Level & HP meningkat.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Latihan Pokemon</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>

<div class="container">
    <h1>Latihan Ivysaur</h1>

    <?php if ($msg): ?>
        <p><b><?= $msg ?></b></p>

        <div class="result-box">
            <p><b>Jenis:</b> <?= $session['trainingType'] ?></p>
            <p><b>Intensitas:</b> <?= $session['intensity'] ?></p>
            <p><b>Level:</b> <?= $session['levelBefore'] ?> → <?= $session['levelAfter'] ?></p>
            <p><b>HP:</b> <?= $session['hpBefore'] ?> → <?= $session['hpAfter'] ?></p>
            <p><b>Jurus Spesial:</b> <?= $session['specialMove'] ?></p>
        </div>
    <?php endif; ?>

    <form method="POST">
        <label>Jenis Latihan:</label>
        <select name="jenis">
            <option value="Attack">Attack</option>
            <option value="Defense">Defense</option>
            <option value="Speed">Speed</option>
        </select>

        <label>Intensitas:</label>
        <input type="number" name="intensitas" required>

        <button class="btn" type="submit">Mulai Latihan</button>
    </form>

    <a href="index.php" class="btn">Kembali</a>
    <a href="history.php" class="btn">Riwayat Latihan</a>
</div>

</body>
</html>
