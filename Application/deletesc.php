<?php

$my = $_SESSION['username1'];
//echo "$my";
$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Users', $db) or die(mysql_error($db));
mysql_query("DELETE FROM $my WHERE Id=".$_SESSION['delid']);

?>