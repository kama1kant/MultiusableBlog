<html>

<head>
<style type="text/css">
body
{
background-image: url("4.JPG");
background-position: 50% 50%;
background-repeat: no-repeat;
}


.mov
{

position:fixed;
top:250px;
left:640px;

}
</style>
</head>

<body>



<?php
echo '<div class="mov">';

session_start();
$u = $_SESSION['username1'];
$f=0;
$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Users', $db) or die(mysql_error($db));



		$query = "SELECT * FROM record WHERE Username = '$u'";

		$result = mysql_query($query, $db) or die (mysql_error($db));

while ($row = mysql_fetch_assoc($result))
{

$rr = $row['Id'];
if($row['Pass'] == $_POST['opass'])
$f=1;

}

if($f==1)
{

if(strlen($_POST['npass'])>=6)
{
mysql_query('UPDATE record SET Pass = "'. $_POST['npass'] .'" WHERE Id = '.$rr);
echo 'Updated';
}

else
echo 'Password length must be atleast 6';

}

if($f==0)
{

echo 'Password not matched';


}

echo '<br><br><a href="resetsc.php">Reset Password</a><br><br>';
echo '<a href="profilesc.php">Profile</a>';

echo '</div>';
?>


</body>
</html>