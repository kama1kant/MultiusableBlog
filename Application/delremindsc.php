<?php
session_start();

$ct = $_SESSION['count'];
$my = $_SESSION['username1'];

echo $my;

$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Users', $db) or die(mysql_error($db));

if(isset($_POST['remind']))
$R = $_POST['remind'];

if(isset($R))
  {
    $NN = count($R);
    echo("You selected $N door(s): ");
    for($i=0; $i < $NN; $i++)
    {
      echo($R[$i] . " ");
	  mysql_query('UPDATE '."$my".' SET RemindDate = "" WHERE Id = '.$R[$i]);
	  mysql_query('UPDATE '."$my".' SET RemindTime = "" WHERE Id = '.$R[$i]);
	  mysql_query('UPDATE '."$my".' SET Reminder = "" WHERE Id = '.$R[$i]);
	  }
	header("location:remindsc.php"); 
  }
header("location:remindsc.php"); 
?>
