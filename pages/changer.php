<?php
session_start();
require('../incl/fonction.php');
$list=list_dept_simple();
$nom_dept=nom_dept($_SESSION['dept_no']);
$date_debut= date_debut_dept($_SESSION['dept_no']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix Département</title>
</head>
<body>
    <nav>
        <a href="fiche.php">&gt retour</a>
    </nav>
    <main>
        <p>Departement Actuel:<?= $nom_dept?></p>
        <p>Date de début: <?= $date_debut?></p>
        <h1>Changer de département</h1>
        <form action="traitement_changer_dept.php" method="get">
            <select name="choix" id="">
                <?php foreach($list as $dept): ?>
                    <option value="<?= htmlspecialchars($dept['dept_no']) ?>">
                        <?= $dept['dept_name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Changer de département">
        </form>
    </main>
</body>
</html>