<?php
    session_start();

    $_SESSION['emp_no']=$_GET['emp_no'];
    $_SESSION['count']=0;
    header('Location:fiche.php');
?>