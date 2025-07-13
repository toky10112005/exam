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
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container py-4">
        <nav class="mb-4">
            <a href="fiche.php" class="btn btn-outline-secondary">&lt; retour</a>
        </nav>
        
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h1 class="h5 mb-0">Changer de département</h1>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <p class="mb-1"><strong>Departement Actuel:</strong> <?= $nom_dept?></p>
                    <p class="mb-0"><strong>Date de début:</strong> <?= $date_debut?></p>
                </div>
                
                <form action="traitement_changer_dept.php" method="get">
                    <div class="row g-3 align-items-end">
                        <div class="col-md-8">
                            <label class="form-label">Nouveau département</label>
                            <select name="choix" class="form-select">
                                <?php foreach($list as $dept): ?>
                                    <option value="<?= htmlspecialchars($dept['dept_no']) ?>">
                                        <?= $dept['dept_name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary w-100">Changer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>