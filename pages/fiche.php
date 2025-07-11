<?php 
    session_start();
    require('../incl/fonction.php');
    $list=fiche($_SESSION['emp_no']);
    $nom_dept=nom_dept($_SESSION['dept_no']);
    $titre_emp=titre_emp($_SESSION['emp_no']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <nav>
        <a href="List_employees.php">Retour</a>
    </nav>
    <main>
        <ul>
                <li><strong>Nom:</strong> <?= $list['first_name']?></li>
                <li><strong>Prenom:</strong> <?= $list['last_name']?></li>
                <li><strong>Sexe:</strong> <?= $list['gender']?></li>
                <li><strong>Salaire:</strong> <?= $list['max']?> $</li>
                <li><strong>Departement:</strong> <?= $nom_dept['dept_name']?></li>
                <li><strong>Poste:</strong> <?= $titre_emp['title']?></li>

                <form action="traitement_historique.php" method="post">
                    <input type="submit" value="Voir historique des salaires">
                </form>
        </ul>    
        <?php if($_SESSION['count'] % 2==0){
                $histo_salaire=histo_salaire($_SESSION['emp_no']);?>
                <table border='1px'>
                    <?php foreach($histo_salaire as $histo_salaire){?>
                        <tr>
                            <td><?= $histo_salaire['salary']?> $</td>
                        </tr>    
                    <?php }?>
                </table>

        <?php }?>
        
    </main>
</body>
</html>