<?php
session_start(); 
    require('../incl/fonction.php');
    $list=list_emp($_SESSION['dept_no']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container py-4">
        <nav class="mb-4">
            <a href="index.php" class="btn btn-outline-secondary">Retour</a>
        </nav>
        
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h2 class="h5 mb-0">Employees</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Employees</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($list as $list){?>
                                <tr>
                                    <td><a href="traitement_fiche.php?emp_no=<?= $list['emp_no']?>"><?= $list['first_name']?></a></td>
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