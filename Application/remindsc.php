<html>
<title>Add Reminders</title>

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
$_SESSION['search']="";
$_SESSION['Error']="";
$_SESSION['ECname']=0;
$_SESSION['ECnum']=0;
$_SESSION['ECid']=0;
$fd=0;




if(empty($_SESSION['ERd']))
$_SESSION['ERd']=0;

if(empty($_SESSION['ERt']))
$_SESSION['ERt']=0;

if(empty($_SESSION['ERr']))
$_SESSION['ERr']=0;


if(empty($_SESSION['username1']))
header("location:loginsc.php");
echo "<h1>REMINDER PAGE of ".$_SESSION['username1']."</h1>";
//echo $_SESSION['username1'];
//echo '<br><br><br><br><br>';
$my = $_SESSION['username1'];
$_SESSION['flag']='0';

include("memrysc.php");
?>

		
		<form action="remindaddsc.php" method="post">
			<table>
				<tr><th><h3>Add Reminder</h3></tr>
				<tr><td><?php if($_SESSION['ERd']==1)echo '*'; ?>Date:<td><input type="text" name="yy" size="4"/><b>-</b>
				<input type="text" name="mm" size="2"/><b>-</b> <input type="text" name="dd" size="2"/>YYYY-MM-DD
				
				</tr>
				<tr><td><?php if($_SESSION['ERt']==1)echo '*'; ?>Time:<td>
				<input type="text" name="hh" size="2"/> <b>:</b><input type="text" name="mi" size="2"/> <b>:</b><input type="text" name="ss" size="2"/>HH:MM:SS
				
				</tr>
				<tr><td><?php if($_SESSION['ERr']==1)echo '*'; ?>Remind me about:<td><input type="text" name="remind" /></tr>

				<tr><td><td><input type="submit" value="ADD!" /></tr>
			</table>
		</form>
		
		<?php
		if(isset($_SESSION['ErrorR']))
		echo $_SESSION['ErrorR'];
		
		$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Users', $db) or die(mysql_error($db));

		$query = "SELECT * FROM $my ";
$result = mysql_query($query, $db) or die (mysql_error($db));


echo '<br><div style="height:250px;width:650px;font:16px/26px Georgia, Garamond, Serif;overflow:scroll;">';

echo '<table border="1">';
echo '<tr>
<th>Date</th>
<th>Time</th>
<th>Remind Me About</th>
<th>Mark</th>
</tr>';

while ($row = mysql_fetch_assoc($result))
{
if($row['RemindDate']!='0000-00-00')
{
echo '<tr><td>';
echo $row['RemindDate'];
echo ' </td><td>';
}
if($row['RemindTime']!='00:00:00')
{
echo $row['RemindTime'];
echo '</td><td>';
}
if($row['Reminder']!=NULL)
{
echo $row['Reminder'];
echo '</td> <td>';
echo '<form action="delremindsc.php" method="post">';
echo '<input type="checkbox" name="remind[]" value='.$row['Id'].'>';
echo '</td> </tr>';
}

if($row['RemindDate']!='0000-00-00' && $row['RemindTime']!='00:00:00' && $row['Reminder']!=NULL )
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

