<?php
session_start();

$ct = $_SESSION['count'];
$my = $_SESSION['username1'];
$mk = $my.'P';

echo $my;
$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Users', $db) or die(mysql_error($db));
$query = 'INSERT INTO '."$mk".'
(Comment'.$ct.' , Sender'.$ct.')
	VALUES
	("' . $_POST['cmnt'] . '" , "' . $my . '")';
		
mysql_query($query, $db) or die(mysql_error($db));

echo 'Added';
header("location:postsc.php");

?>