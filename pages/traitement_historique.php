<?php 
session_start();
require('../incl/fonction.php');



$_SESSION['count']=$_SESSION['count']+1;
   header('Location:fiche.php');
   exit();

?>