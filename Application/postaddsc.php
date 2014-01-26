<?php
session_start();
$n = 2;
$my = $_SESSION['username1'];
echo $my;
$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Users', $db) or die(mysql_error($db));

//$query = 'UPDATE '."$my".'SET Post = "'. $_POST['post'] .'"  WHERE Id = 1';

mysql_query('UPDATE '."$my".' SET Post = "'. $_POST['post'] .'" WHERE Id = '.$n);


echo $_POST['post'];


//mysql_query($query, $db) or die(mysql_error($db));

echo 'Added';
//header("location:postsc.php");
?>