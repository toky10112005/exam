<?php
    session_start();

    $_SESSION['dept_no']=$_GET['dept_no'];

    header('Location:List_employees.php');
?>