<?php
session_start();
$f=0;
$c=$_POST['comp'];
$my = $_SESSION['username1'];

$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Users', $db) or die(mysql_error($db));
$query = "SELECT * FROM $my ";
$result = mysql_query($query, $db) or die (mysql_error($db));

while ($row = mysql_fetch_assoc($result))
{
if($c == $row['ContactName'])
{

$_SESSION['flag']=1;

$f=1;
$_SESSION['ans1'] = $row['ContactName'];
$_SESSION['ans2'] = $row['ContactID'];
$_SESSION['ans3'] = $row['ContactNum'];
break;

}

}
if($f==0)
{

$_SESSION['ans1'] = "";
$_SESSION['ans2'] = "";
$_SESSION['ans3'] = "";

}
header("location:homesc.php");


?>

