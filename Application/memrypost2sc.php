<?php

$my = $_SESSION['username1'];
$mk = $my.'P';
$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Users', $db) or die(mysql_error($db));
mysql_query("DELETE FROM $mk WHERE Id=".$_SESSION['delid']);

?>