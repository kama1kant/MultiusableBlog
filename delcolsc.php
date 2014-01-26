<?php
session_start();
$d = $_SESSION['getid'];
$ct = $_SESSION['count'];
$my = $_SESSION['username1'];
$mk = $my.'P';
echo $my;
$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Users', $db) or die(mysql_error($db));

mysql_query('UPDATE '."$mk".' SET Comment'.$d.' = "" ');
mysql_query('UPDATE '."$mk".' SET Sender'.$d.' = "" ');
echo 'Deleted';


?>