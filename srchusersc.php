<?php
session_start();
$fs=0;
$_SESSION['search']='';
$count = $_SESSION['count'];
if(empty($_SESSION['cpost']))
$_SESSION['cpost']="";
$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Users', $db) or die(mysql_error($db));

if($_POST['srch']==NULL)
header("location:profilesc.php");

		$query = "SELECT * FROM record";
$result = mysql_query($query, $db) or die (mysql_error($db));
while ($row = mysql_fetch_assoc($result))
{
if($_POST['srch']==$row['Username'])
{
$fs=1;
echo 'found';

$my = $row['Username'];
$mk = $my.'p';
$_SESSION['cuser'] = $my;
$_SESSION['cpost'] = $mk;
header("location:cpostsc.php");
echo $mk;
break;
}
}

if($fs==0)
{
$_SESSION['search'] = '<b><i>*Error* User not found</i></b>';
header("location:profilesc.php");
}
/*
$query = "SELECT * FROM $mk WHERE Id =  $count";
$result = mysql_query($query, $db) or die (mysql_error($db));
echo '<table>';
while ($row = mysql_fetch_assoc($result))
{
echo '<tr><td><h2>';
if($row['Post']!='0')
echo $row['Post'];
echo ' </td></h2>';
echo '</tr> ';
}
echo '</table>';
$query = "SELECT * FROM $mk WHERE Id =  $count";
$result = mysql_query($query, $db) or die (mysql_error($db));

echo 'COMMENTS :';
echo '<div style="height:150px;width:500px;font:16px/26px Georgia, Garamond, Serif;overflow:scroll;">';
echo '<table>';
while ($row = mysql_fetch_assoc($result))
{
echo '<tr><td>';
if($row['Comment'.$count]!=NULL)
{
$_SESSION['iid'] = $row['Id'];
echo $row['Comment'.$count];
echo '</td><td>';
echo '<form action="delcmntsc.php" method="post">';
echo '<input type="checkbox" name="cmnt[]" value='.$row['Id'].'>';

}
echo '</td></tr>';
}
echo '</table>';
echo '</div>';
echo '<input type="submit" value="Delete!" />';
echo '</form>';
echo '<a href="prevpostsc.php">Previous</a>';
echo '<a href="nxtpostsc.php">Next</a>';
*/
?>