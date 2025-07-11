<?php
ini_set('display_errors', '1');
require('../incl/fonction.php');

$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$limit = 20;
$offset = ($page - 1) * $limit;

$rech = recherche($_GET['departments'], $_GET['emplyees'], $_GET['min'], $_GET['max'], $limit, $offset);
$rech_next = recherche($_GET['departments'], $_GET['emplyees'], $_GET['min'], $_GET['max'], 1, $offset + $limit);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de recherche</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5>Résultats de recherche</h5>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <?php foreach($rech as $row){ ?>
                        <li class="list-group-item"><?=$row['dept_name']?> - <?=$row['first_name']?> <?=$row['last_name']?></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="card-footer">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <?php if($page > 1){ ?>
                            <li class="page-item">
                                <a class="page-link" href="?departments=<?=urlencode($_GET['departments'])?>&emplyees=<?=urlencode($_GET['emplyees'])?>&min=<?=urlencode($_GET['min'])?>&max=<?=urlencode($_GET['max'])?>&page=<?=$page-1?>">Précédent</a>
                            </li>
                        <?php } ?>
                        <?php if(count($rech_next) > 0){ ?>
                            <li class="page-item">
                                <a class="page-link" href="?departments=<?=urlencode($_GET['departments'])?>&emplyees=<?=urlencode($_GET['emplyees'])?>&min=<?=urlencode($_GET['min'])?>&max=<?=urlencode($_GET['max'])?>&page=<?=$page+1?>">Suivant</a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>