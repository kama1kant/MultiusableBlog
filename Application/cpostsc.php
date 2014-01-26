<html>
<title>Post Page</title>
<head>
<head>

<link rel="stylesheet" type="text/css" href="style2.css" />
</head>
<body>

<a href="profilesc.php">Profile</a>
<a href="remindsc.php">Reminder</a>
<a href="homesc.php">Contacts</a>
<a href="postsc.php">Post</a>
<a href="logoutsc.php">Logout</a>
<?php
session_start();

$_SESSION['ErrorR']="";
$_SESSION['search']="";
$_SESSION['Error']="";
$_SESSION['ECname']=0;
$_SESSION['ECnum']=0;
$_SESSION['ECid']=0;

$_SESSION['ERd']=0;
$_SESSION['ERt']=0;
$_SESSION['ERr']=0;

if(empty($_SESSION['username1']))
header("location:loginsc.php");

if(isset($_SESSION['chk']))
;
else
$_SESSION['chk']=0;
$_SESSION['flag']='0';
include("memrypostsc.php");
$mk = $_SESSION['cpost'];
if(empty($_SESSION['count']))
{

$_SESSION['count'] = 1;
}

?>

<div class="hdng">
<?php
echo "<h1>POST PAGE of ".$_SESSION['cuser']."</h1>";
?>





<?php
$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Users', $db) or die(mysql_error($db));
$count = $_SESSION['count'];
$query = "SELECT * FROM $mk WHERE Id =  $count";
$result = mysql_query($query, $db) or die (mysql_error($db));
echo '<table>';
while ($row = mysql_fetch_assoc($result))
{

if($row['Post']!=NULL)
{
echo '<tr><td><h2>';
echo $row['Post'];
echo ' </td></h2>';
echo '</tr> ';
}
}
echo '</table>';
$query = "SELECT * FROM $mk";
$result = mysql_query($query, $db) or die (mysql_error($db));

echo 'COMMENTS :';
echo '<div style="height:150px;width:500px;font:16px/26px Georgia, Garamond, Serif;overflow:scroll;">';
echo '<table>';
while ($row = mysql_fetch_assoc($result))
{
echo '<tr><td>';
if($row['Comment'.$count]!=NULL)
{
echo '<form action="cdelcmntsc.php" method="post">';
if($row['Sender'.$count]==$_SESSION['username1'])
echo '<input type="checkbox" name="cmnt[]" value='.$row['Id'].'>';
echo '</td><td>';
$_SESSION['iid'] = $row['Id'];
echo $row['Comment'.$count];
echo ' <i>* (by '.$row['Sender'.$count].' ) ';
}
echo '</td></tr>';
}
echo '</table>';
echo '</div>';
echo '<input type="submit" value="Delete!" />';
echo '</form>';
echo '<a href="cprevpostsc.php">Previous</a>';
echo '<a href="cnxtpostsc.php">Next</a>';
?>


		<form action="ccmntaddsc.php" method="post">
			<table>
		<tr><td>Comments : <TEXTAREA NAME="cmnt" COLS=30 ROWS=5></TEXTAREA></tr>
		<tr><td><td><input type="submit" value="ADD COMMENT!" /></tr>
			</table>
		</form>
<?php
if(isset($_SESSION['ErrorCC']))
echo $_SESSION['ErrorCC'];
?>
			</div>
			
</body>
</html>

