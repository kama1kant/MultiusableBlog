<?php
session_start();

$ct = $_SESSION['count'];
$my = $_SESSION['username1'];

echo $my;

$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Users', $db) or die(mysql_error($db));


if(isset($_POST['contact']))
$C = $_POST['contact'];


if(isset($C))
  {
    $N = count($C);
    echo("You selected $N door(s): ");
    for($i=0; $i < $N; $i++)
    {
      echo($C[$i] . " ");
	  mysql_query('UPDATE '."$my".' SET ContactName = "" WHERE Id = '.$C[$i]);
	  mysql_query('UPDATE '."$my".' SET ContactID = "" WHERE Id = '.$C[$i]);
	  mysql_query('UPDATE '."$my".' SET ContactNum = "" WHERE Id = '.$C[$i]);
	  	  
    }
	header("location:homesc.php");
  }
  
header("location:homesc.php"); 
?>
