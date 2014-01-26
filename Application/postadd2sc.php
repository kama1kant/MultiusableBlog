<?php
session_start();

$my = $_SESSION['username1'];
$mk = $my.'P';
echo $my;
$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Users', $db) or die(mysql_error($db));
if($_SESSION['chk']<5)
{
if($_SESSION['f']<5)
{

$query = 'INSERT INTO '."$mk".'
(Post)
	VALUES
	("' . $_POST['post'] . '")';
		
mysql_query($query, $db) or die(mysql_error($db));


$_SESSION['chk']=$_SESSION['chk']+1;
$_SESSION['f'] = $_SESSION['f'] +1;
}
else
{
$v = $_SESSION['chk']+1;
$_SESSION['getid']=$v;
mysql_query('UPDATE '."$mk".' SET Post = "'. $_POST['post'] .'" WHERE Id = '.$v);
$_SESSION['chk']=$_SESSION['chk']+1;
include("delcolsc.php");
}
}

else if($_SESSION['chk']>=5 && $_SESSION['chk']<10)
{

$cc = $_SESSION['chk']-4;
$_SESSION['getid']=$cc;

mysql_query('UPDATE '."$mk".' SET Post = "'. $_POST['post'] .'" WHERE Id = '.$cc);
$_SESSION['chk']=$_SESSION['chk']+1;

include("delcolsc.php");

}

else if($_SESSION['chk']>=10)
{

$_SESSION['chk']=0;
}
echo 'Added';
header("location:postsc.php");

?>