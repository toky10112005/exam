<?php 
session_start();
require('../incl/fonction.php');

    changer_dept($_GET['choix'], $_SESSION['emp_no']);
    $_SESSION['dept_no'] = $_GET['choix'];
        header('Location: fiche.php');
    exit();
?>