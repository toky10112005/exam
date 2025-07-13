<?php 
session_start();
    require('../incl/fonction.php');
    $list=list_dept();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des departement</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container py-4">
        <h1 class="text-center mb-4">Bienvenue à vous</h1>
        
        <div class="card shadow mb-4">
            <div class="card-header bg-primary text-white">
                <h2 class="h5 mb-0">Recherche avancée</h2>
            </div>
            <div class="card-body">
                <form action="resultat.php" method="get" class="row g-3">
                    <div class="col-md-3">
                        <label for="departments" class="form-label">Département</label>
                        <input type="search" name="departments" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="employees" class="form-label">Nom</label>
                        <input type="search" name="emplyees" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label for="min" class="form-label">Âge min:</label>
                        <input type="number" name="min" min="0" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label for="max" class="form-label">Âge max:</label>
                        <input type="number" name="max" min="0" class="form-control">
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">Rechercher</button>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <a href="resume.php" class="btn btn-outline-secondary">Tableau de résumer</a>
            </div>
        </div>

        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h2 class="h5 mb-0">Liste des départements</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Departement</th>
                                <th>Manager</th>
                                <th>Nbr Employees</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($list as $list){ ?>
                                <tr>
                                    <td><a href="traitement_emp.php?dept_no=<?= $list['dept_no']?>"><?= $list['dept_name']?></a></td>
                                    <td><?= $list['first_name']?></td>
                                    <?php $count=count_employees($list['dept_no']);?>
                                    <td><?= $count?></td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>