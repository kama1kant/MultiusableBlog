<html>
<title>Add Contact</title>

<head>
<link rel="stylesheet" type="text/css" href="style2.css" />
</head>
<body>
<a href="profilesc.php">Profile</a>
<a href="remindsc.php">Reminder</a>
<a href="homesc.php">Contacts</a>
<a href="postsc.php">Post</a>
<a href="logoutsc.php">Logout</a>

<div class="hdng">
<?php
session_start();
$fd=0;
$_SESSION['search']="";
$_SESSION['ErrorR']="";

$_SESSION['ERd']=0;
$_SESSION['ERt']=0;
$_SESSION['ERr']=0;


if(empty($_SESSION['ECname']))
$_SESSION['ECname']=0;

if(empty($_SESSION['ECnum']))
$_SESSION['ECnum']=0;

if(empty($_SESSION['ECid']))
$_SESSION['ECid']=0;

if(empty($_SESSION['username1']))
header("location:loginsc.php");
echo "<h1>CONTACT PAGE of ".$_SESSION['username1']."</h1>";
$my = $_SESSION['username1'];

if(empty ($_SESSION['flag']))
$_SESSION['flag']=0;
if($_SESSION['flag']==0)
{
$_SESSION['ans1'] = "";
$_SESSION['ans2'] = "";
$_SESSION['ans3'] = "";
}

include("memrysc.php");


?>

		<form action="consearchsc.php" method="post">
		Search : <input type="text" name="comp" />
		<input type="submit" value="Search!" />
		</form>
		
		<?php
		echo '<b>Search Result : </b>';
		echo $_SESSION['ans1']." ";
		echo $_SESSION['ans2']." ";
		echo $_SESSION['ans3']."<br>";
		?>
		
		
		
		<br>
		
		<form action="conaddsc.php" method="post">
			<table>
				<tr><th><h3>Add Contact</h3></tr>
				<tr><td><?php if($_SESSION['ECname']==1)echo '*'; ?>Contact Name:<td><input type="text" name="name" /></tr>
				<tr><td><?php if($_SESSION['ECnum']==1)echo '*'; ?>Contact Number:<td><input type="text" name="num" /></tr>
				<tr><td><?php if($_SESSION['ECid']==1)echo '*'; ?>Contact Email-ID:<td><input type="text" name="id" /></tr>

				<tr><td><td><input type="submit" value="ADD!" /></tr>
			</table>
		</form>
<?php
if(isset($_SESSION['Error']))
echo $_SESSION['Error'];
echo '<br><br>';
?>
<?php
$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Users', $db) or die(mysql_error($db));

		$query = "SELECT * FROM $my ORDER BY ContactName";
$result = mysql_query($query, $db) or die (mysql_error($db));

echo '<div style="height:150px;width:650px;font:16px/26px Georgia, Garamond, Serif;overflow:scroll;">';

echo '<table  border="1">';
echo '<tr>
<th>Name</th>
<th>Email-ID</th>
<th>Contact Number</th>
<th>Mark</th>
</tr>';


while ($row = mysql_fetch_assoc($result))
{

$_SESSION['contctid'] = $row['Id'];


if($row['ContactName']!=NULL)
{
echo '<tr><td>';
echo $row['ContactName'];
echo ' </td><td>';
}
if($row['ContactID']!=NULL)
{
echo $row['ContactID'];
echo '</td><td>';
}
if($row['ContactNum']!=0)
{
echo $row['ContactNum'];
echo '</td><td>';
echo '<form action="delcontactsc.php" method="post">';
echo '<input type="checkbox" name="contact[]" value='.$row['Id'].'>';
echo '</td></tr>';
}
if($row['ContactNum']!=0 && $row['ContactID']!=NULL && $row['ContactName']!=NULL )
{
$fd=1;

}

}

echo '</table>';
echo '</div>';
if($fd==1)
{
echo '<input type="submit" value="Delete!" />';
}

echo '</form>';
?>




		</div>	
</body>
</html>

