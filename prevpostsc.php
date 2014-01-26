<?php
session_start();

$_SESSION['j'] = $_SESSION['j']-1;

$_SESSION['flog'] = 0;
header("location:arraysc.php");
?>