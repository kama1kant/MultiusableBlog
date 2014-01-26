<?php
session_start();

$my = $_SESSION['username1'];
$mk = $my.'P';
echo $my;
$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Users', $db) or die(mysql_error($db));
$query = "SELECT * FROM $mk WHERE Id= 5";
$result = mysql_query($query, $db) or die (mysql_error($db));
while ($row = mysql_fetch_assoc($result))
{

	if($row['Post']!=NULL)
	{
	$flag = 1;
	}

else
{
$flag=0;
}

}

if($flag==0)
{
echo "Unset";
$query = 'INSERT INTO '."$mk".'
(Post)
	VALUES
	("' . $_POST['post'] . '")';
		
mysql_query($query, $db) or die(mysql_error($db));

}

if($flag==1)
{
echo "Set";
$query = "SELECT * FROM $mk WHERE Id=6";
$result = mysql_query($query, $db) or die (mysql_error($db));
while ($row = mysql_fetch_assoc($result))
{
if($row['Post']!=NULL)
{
$f6=1;
$v = $row['Post'];
break;
}

else if($row['Post']==NULL)
$f6=0;
}

if($f6==0)
{
$query = 'INSERT INTO '."$mk".'
(Post)
	VALUES
	(" 2 ")';
		
mysql_query($query, $db) or die(mysql_error($db));

mysql_query('UPDATE '."$mk".' SET Post = "'. $_POST['post'] .'" WHERE Id = "1"');
$_SESSION['getid']=1;
include("delcolsc.php");
}

if($f6==1)
{
if($v<5)
$plus = intval($v)+1;
else if($v==5)
$plus = 1;


mysql_query('UPDATE '."$mk".' SET Post = "'. $_POST['post'] .'" WHERE Id = '.$v);
mysql_query('UPDATE '."$mk".' SET Post = "'. $plus .'" WHERE Id = "6"');
$_SESSION['getid']=$v;
include("delcolsc.php");

}

}
header("location:postsc.php");
?>