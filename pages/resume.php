<?php 
session_start();
require('../incl/fonction.php');
$list=list_dept_simple();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résumer</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container py-4">
        <nav class="mb-4">
            <a href="index.php" class="btn btn-outline-secondary">Retour</a>
        </nav>
        
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h2 class="h5 mb-0">Résumé par département</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>DEPARTEMENT</th>
                                <th>HOMMES</th>
                                <th>FEMMES</th>
                                <th>MOYENNE SALAIRE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($list as$list){
                                    $trie_x=trie_x($list['dept_no']);
                                    $trie_y=trie_y($list['dept_no']);
                                    $moyenne=Moyenne_salaire($list['dept_no'])?>
                                <tr>
                                    <td><?= $list['dept_name']?></td>
                                    <td><?= $trie_y?></td>
                                    <td><?= $trie_x?></td>
                                    <td><?= $moyenne?> $</td>
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