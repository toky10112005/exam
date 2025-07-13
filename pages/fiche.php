<?php 
    session_start();
    require('../incl/fonction.php');
    $list=fiche($_SESSION['emp_no']);
    $nom_dept=nom_dept($_SESSION['dept_no']);
    $titre_emp=titre_emp($_SESSION['emp_no']);
    $employe_long=emploie_long($_SESSION['emp_no']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container py-4">
        <nav class="mb-4 d-flex gap-2">
            <a href="List_employees.php" class="btn btn-outline-secondary">Retour</a>
            <a href="changer.php" class="btn btn-outline-primary">Changer de département</a>
            <a href="promo.php" class="btn btn-outline-success">Devenir manager</a>
        </nav>
        
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h1 class="h5 mb-0">Fiche Employé</h1>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush mb-4">
                    <li class="list-group-item"><strong>Nom:</strong> <?= $list['first_name']?></li>
                    <li class="list-group-item"><strong>Prenom:</strong> <?= $list['last_name']?></li>
                    <li class="list-group-item"><strong>Sexe:</strong> <?= $list['gender']?></li>
                    <li class="list-group-item"><strong>Salaire:</strong> <?= $list['max']?> $</li>
                    <li class="list-group-item"><strong>Departement:</strong> <?= $nom_dept['dept_name']?></li>
                    <li class="list-group-item"><strong>Poste:</strong> <?= $titre_emp['title']?></li>
                    <li class="list-group-item"><strong>Employe le plus long:</strong> <?= $employe_long['title']?></li>
                </ul>

                <form action="traitement_historique.php" method="post" class="mb-4">
                    <button type="submit" class="btn btn-info">Voir historique des salaires</button>
                </form>
                
                <?php if($_SESSION['count'] % 2==0){
                    $histo_salaire=histo_salaire($_SESSION['emp_no']);?>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Historique des salaires</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($histo_salaire as $histo_salaire){?>
                                    <tr>
                                        <td><?= $histo_salaire['salary']?> $</td>
                                    </tr>    
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
</body>
</html>