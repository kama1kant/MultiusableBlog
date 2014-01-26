<?php
session_start();
$i=0;
$mk = $_SESSION['cpost'];
//$_SESSION['count'] = $j;

$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Users', $db) or die(mysql_error($db));

$query = "SELECT * FROM $mk";
$result = mysql_query($query, $db) or die (mysql_error($db));
while ($row = mysql_fetch_assoc($result))
{
if($row['Post']!=NULL)
{

//echo $row['Post'].'<br>';
$popo[$i] = $row['Id'];
//echo $popo[$i];
$i=intval($i)+1;

}
}

//for($j=0;$j<count($popo);$j++)
//echo $popo[$j];



//echo '<br>Count = '.count($popo);

if($_SESSION['flog'] == 1)
{
$j = $_SESSION['j'];

if($j<count($popo))
{
$_SESSION['count'] = $popo[$j];
}
else
{
$_SESSION['j'] = $_SESSION['j']-1;
$_SESSION['count'] = $popo[$j-1];
}

}


if($_SESSION['flog'] == 0)
{
$j = $_SESSION['j'];

if($j>=0)
{
$_SESSION['count'] = $popo[$j];
}
else
{
$_SESSION['j'] = $_SESSION['j']+1;
$_SESSION['count'] = $popo[$j+1];
}

}

header("location:cpostsc.php");


?>