<?php

$_SESSION['delid']="";
$my = $_SESSION['username1'];
$mk = $my.'P';
$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Users', $db) or die(mysql_error($db));
$query = "SELECT * FROM $mk";

$result = mysql_query($query, $db) or die (mysql_error($db));
while ($row = mysql_fetch_assoc($result))
{
if($row['Post']==NULL && $row['Comment1']==NULL && $row['Comment2']==NULL && $row['Comment3']==NULL && $row['Comment4']==NULL && $row['Comment5']==NULL)
{

$_SESSION['delid'] = $row['Id'];
include("memrypost2sc.php");

}
else
;
}


?>