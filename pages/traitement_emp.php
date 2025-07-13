<?php
    session_start();
    require('../incl/fonction.php');
    $_SESSION['dept_no']=$_GET['dept_no'];
    $_SESSION['nom_manager']=nom_manager($_SESSION['dept_no']);

    header('Location:List_employees.php');
?>