<?php
session_start();
$_SESSION['count']=1;
echo "POST PAGE";
echo $_SESSION['username1'];
echo '<br><br><br><br><br>';
$my = $_SESSION['username1'];
$_SESSION['flag']='0';

?>

<html>
<title>Post Page</title>
<body>

<a href="remindsc.php">Reminder</a>


		<form action="postadsc.php" method="post">
			<table>
				<tr><th><h3>Add Post</h3></tr>
				<tr><td>Post : <TEXTAREA NAME="post" COLS=50 ROWS=11></TEXTAREA></tr>
				<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
				
				
				<tr><td><td><input type="submit" value="ADD POST!" /></tr>
			</table>
		</form>
		
		
		<form action="cmntaddsc.php" method="post">
			<table>
		<tr><td>Comments : <TEXTAREA NAME="cmnt" COLS=30 ROWS=5></TEXTAREA></tr>
		<tr><td><td><input type="submit" value="ADD COMMENT!" /></tr>
			</table>
		</form>
		
		
		
		
		<?php
		$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Users', $db) or die(mysql_error($db));
$count = $_SESSION['count'];
		$query = "SELECT * FROM $my WHERE Id =  $count";
$result = mysql_query($query, $db) or die (mysql_error($db));
echo '<ol><table>';
while ($row = mysql_fetch_assoc($result))
{
echo '<tr><td><h2>';
if($row['Post']!='0')
echo $row['Post'];
echo ' </td><td></h2>';
if($row['Comment']!='0')
echo $row['Comment'];
echo ' </td></tr> ';
}

echo '</table>';
echo '<a href="Countsc.php">Next</a>';
?>
			
</body>
</html>

