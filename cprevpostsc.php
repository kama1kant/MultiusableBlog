<?php
session_start();
//if($_SESSION['count']>1)
//$_SESSION['count']=$_SESSION['count']-1;
//header("location:cpostsc.php");

$_SESSION['j'] = $_SESSION['j']-1;

$_SESSION['flog'] = 0;
header("location:carraysc.php");


?>