<?php
session_start();
$_SESSION['ErrorCC']="";
$ct = $_SESSION['count'];
$my = $_SESSION['username1'];

echo $my;
$mk = $_SESSION['cpost'];
$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Users', $db) or die(mysql_error($db));

if(empty($_POST['cmnt']))
{
$_SESSION['ErrorCC'] = 'Field left blank';
echo 'Field left blank';

}
else
{


$query = 'INSERT INTO '."$mk".'
(Comment'.$ct.' , Sender'.$ct.')
	VALUES
	("' . $_POST['cmnt'] . '" , "' . $my . '")';
		
mysql_query($query, $db) or die(mysql_error($db));

echo 'Added';
}
header("location:cpostsc.php");

?>