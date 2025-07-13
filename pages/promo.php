<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promotion</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container py-4">
        <nav class="mb-4">
            <div class="alert alert-info mb-0">
                <p class="mb-0">Manager en court: <?= $_SESSION['nom_manager'];?></p>
            </div>
        </nav>
        
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h2 class="h5 mb-0">Promotion</h2>
            </div>
            <div class="card-body text-center">
                <form action="traitement_promo.php" method="get">
                    <button type="submit" class="btn btn-success btn-lg">Valider la promotion</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>