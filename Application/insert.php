<?php


$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Ourdream', $db) or die(mysql_error($db));
$query = 'INSERT INTO amazon
(Name , Number)
	VALUES
	("Kamal",78799)';
		
mysql_query($query, $db) or die(mysql_error($db));


?>