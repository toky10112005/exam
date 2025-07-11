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
<body>
    <nav>
        <a href="index.php">Retour</a>
    </nav>
    <main>
        <table border='1px'>
            <tr>
                <td>Employees</td>
            </tr>
        <?php foreach($list as $list){?>
            <tr>
                <td><a href="traitement_fiche.php?emp_no=<?= $list['emp_no']?>"><?= $list['first_name']?></a></td>
            </tr>
            <?php }?>
        </table>
    </main>
</body>
</html>