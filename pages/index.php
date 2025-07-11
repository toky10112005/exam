<?php 
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
<body>
    <main>
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5>Recherche avancée</h5>
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
                        <input type="submit" value="Rechercher" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>

        <table border='1px'>
            <tr>
                <td><strong>Departement</strong></td>
                <td><strong>Manager</strong></td>
                <td><strong>Nbr Employees</strong></td>
            </tr>
            <?php foreach($list as $list){ ?>
                <tr>
                    <td><a href="traitement_emp.php?dept_no=<?= $list['dept_no']?>"><?= $list['dept_name']?></a></td>
                    <td><?= $list['first_name']?></td>
                    <?php $count=count_employees($list['dept_no']);?>
                    <td><?= $count?></td>
                </tr>
                <?php }?>
        </table>
    </main>
</body>
</html>