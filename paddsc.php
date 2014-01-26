<?php
session_start();

$my = $_SESSION['username1'];
$mk = $my.'P';
echo $my;
$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Users', $db) or die(mysql_error($db));

$query = 'INSERT INTO '."$mk".'
(Post)
	VALUES
	("' . $_POST['post'] . '")';
		
mysql_query($query, $db) or die(mysql_error($db));

$query = "SELECT * FROM $mk";
$result = mysql_query($query, $db) or die (mysql_error($db));
while ($row = mysql_fetch_assoc($result))
{
if($row['Post']!=NULL)
$getrow = $row['Id'];
}

echo $getrow;
$_SESSION['grow'] = $getrow;
header("location:altersc.php");
?>