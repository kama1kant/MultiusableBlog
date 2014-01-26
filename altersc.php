<?php
session_start();

$my = $_SESSION['username1'];
$mk = $my.'P';
echo $my;
$col1 = 'Comment'.$_SESSION['grow'];
$col2 = 'Sender'.$_SESSION['grow'];

$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Users', $db) or die(mysql_error($db));

mysql_query("ALTER TABLE $mk "."ADD COLUMN  $col1 VARCHAR(255) NOT NULL "."AFTER Post;");
mysql_query("ALTER TABLE $mk "."ADD COLUMN  $col2 VARCHAR(255) NOT NULL "."AFTER Post;");


//mysql_query("ALTER TABLE nkkp "."ADD COLUMN new2 VARCHAR(255) NOT NULL "."AFTER Post;");


	//mysql_query('ALTER TABLE'."$mk".' Drop new;');			

echo 'Added';
header("location:postsc.php");

?>