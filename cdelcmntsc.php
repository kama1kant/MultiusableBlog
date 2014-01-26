

<?php
session_start();

$d = $_SESSION['getid'];
$ct = $_SESSION['count'];
$my = $_SESSION['username1'];

echo $my;
$mk = $_SESSION['cpost'];
$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Users', $db) or die(mysql_error($db));


if(isset($_POST['cmnt']))
$C = $_POST['cmnt'];


if(isset($C))
  {
    $N = count($C);
    
    for($i=0; $i < $N; $i++)
    {
      
	  mysql_query('UPDATE '."$mk".' SET Comment'.$ct.' = "" WHERE Id = '.$C[$i]);
   	  mysql_query('UPDATE '."$mk".' SET Sender'.$ct.' = "" WHERE Id = '.$C[$i]);   
    }
	header("location:cpostsc.php");
  }
  
header("location:cpostsc.php"); 
?>
