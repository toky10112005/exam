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
</head>
<body>
    <nav>
        <a href="index.php">Retour</a>
    </nav>
    <main>
        <table border='1px'>
            <tr>
                <td>DEPARTEMENT</td>
                <td>HOMMES</td>
                <td>FEMMES</td>
                <td>MOYENNE SALAIRE</td>
            </tr>
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

        </table>
    </main>
</body>
</html>