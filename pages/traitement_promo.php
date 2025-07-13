<?php
    session_start();
    require('../incl/fonction.php');
    promotion($_SESSION['emp_no'], $_SESSION['dept_no']);
    valider_promotion($_SESSION['emp_no'], $_SESSION['dept_no']);
    header('Location: index.php');
    exit();
?>