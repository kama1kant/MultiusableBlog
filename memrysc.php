<?php

$_SESSION['delid']="";
$my = $_SESSION['username1'];
$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Users', $db) or die(mysql_error($db));
$query = "SELECT * FROM $my";

$result = mysql_query($query, $db) or die (mysql_error($db));
while ($row = mysql_fetch_assoc($result))
{
if($row['ContactName']==NULL && $row['ContactID']==NULL && $row['ContactNum']==0 && $row['RemindDate']=='0000-00-00' && $row['RemindTime']=='00:00:00' && $row['Reminder']==NULL)
{

$_SESSION['delid'] = $row['Id'];
include("deletesc.php");

}
else
;
}


?>