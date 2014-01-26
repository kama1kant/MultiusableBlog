<html>
<title>Post Page</title>
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




if(empty($_SESSION['count']))
{

$_SESSION['count'] = 1;
}


if(empty($_SESSION['username1']))
header("location:loginsc.php");

if(isset($_SESSION['chk']))
;
else
$_SESSION['chk']=0;
$my = $_SESSION['username1'];
$mk = $my.'P';
//$_SESSION['flag']='0';
//include("memrypostsc.php");
?>

<div class="hdng">
<?php
echo "<h1>POST PAGE of ".$_SESSION['username1']."</h1>";
?>


<?php
$count =$_SESSION['count'];
$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Users', $db) or die(mysql_error($db));
$count = $_SESSION['count'];
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
echo '<form action="delcmntsc.php" method="post">';
echo '<input type="checkbox" name="cmnt[]" value='.$row['Id'].'>';
echo '</td><td>';

//$_SESSION['iid'] = $row['Id'];
echo $row['Comment'.$count];
echo ' <i>* (by '.$row['Sender'.$count].' ) ';


}
echo '</td></tr>';
}
echo '</table>';
echo '</div>';
echo '<input type="submit" value="Delete!" />';
echo '</form>';
echo '<a href="prevpostsc.php">Previous</a>';
echo '<a href="nxtpostsc.php">Next</a>';


?>

		<form action="paddsc.php" method="post">
			<table>
				<tr><th><h3>Add Post</h3></tr>
				<tr><td>Post : <TEXTAREA NAME="post" COLS=50 ROWS=11></TEXTAREA></tr>
				<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
				
				
				<tr><td><td><input type="submit" value="ADD POST!" /></tr>
			</table>
		</form>
		
		
		<form action="cmntaddsc.php" method="post">
			<table>
		<tr><td>Comments : <TEXTAREA NAME="cmnt" COLS=30 ROWS=5></TEXTAREA></tr>
		<tr><td><td><input type="submit" value="ADD COMMENT!" /></tr>
			</table>
		</form>
			
			
			</div>
			
</body>
</html>

