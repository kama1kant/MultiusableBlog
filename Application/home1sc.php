<?php
session_start();
echo "HOME PAGE";
echo $_SESSION['username1'];
echo '<br><br><br><br><br>';
$my = $_SESSION['username1'];




?>



<html>
<title>Add Contact</title>
<body>

<a href="remindsc.php">Reminder</a>


		<form action="conaddsc.php" method="post">
			<table>
				<tr><th><h3>Add Contact</h3></tr>
				<tr><td>Contact Name:<td><input type="text" name="name" /></tr>
				<tr><td>Contact Number:<td><input type="text" name="num" /></tr>
				<tr><td>Contact Email-ID:<td><input type="text" name="id" /></tr>

				<tr><td><td><input type="submit" value="ADD!" /></tr>
			</table>
		</form>
		
		<?php
		$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Users', $db) or die(mysql_error($db));

		$query = "SELECT * FROM $my ";
$result = mysql_query($query, $db) or die (mysql_error($db));
echo '<ol><table>';
while ($row = mysql_fetch_assoc($result))
{
echo '<tr><td>';
if($row['ContactName']!='0')
echo $row['ContactName'];
echo ' </td><td>';
if($row['ContactID']!='0')
echo $row['ContactID'];
echo '</td><td>';
if($row['ContactNum']!=0)
echo $row['ContactNum'];
echo '</td> </tr>';
}

echo '</table>';
?>
		<form action="consearchsc.php" method="post">
		Search : <input type="text" name="comp" />
		<input type="submit" value="Search!" />
		</form>
		
		<?php
		
		
		echo $_SESSION['ans1'];
		echo $_SESSION['ans2'];
		echo $_SESSION['ans3'];
		
				
		
		
		
		
?>
		
		
		
		
		
		
		
		
		
	
</body>
</html>

