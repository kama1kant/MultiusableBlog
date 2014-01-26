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

session_start();
// store session data
$pass = $_POST["Pass"];
$_SESSION['exist'] = "";
$_SESSION['username'] = $_POST["fname"];
$_SESSION['chk']=0;
$_SESSION['f']=0;
$my = $_SESSION['username'];
$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');

mysql_select_db('Users', $db) or die(mysql_error($db));

$query = "SELECT * FROM record";
$result = mysql_query($query, $db) or die (mysql_error($db));
while ($row = mysql_fetch_assoc($result))
{
if($my==$row['Username'])
{
$_SESSION['exist'] = '*Error* Username already exists';
$_SESSION['Ru']=1;
$_SESSION['Rp']=0;
header("location:sc1.php");

}
}

if($_POST['fname']==NULL && $_POST['Pass']==NULL )
{
$_SESSION['exist'] = '*Error* Field left empty';
$_SESSION['Ru']=1;
$_SESSION['Rp']=1;
header("location:sc1.php");
}

else if($_POST['fname']==NULL && $_POST['Pass']!=NULL )
{
$_SESSION['exist'] = '*Error* Field left empty';
$_SESSION['Ru']=1;
$_SESSION['Rp']=0;
header("location:sc1.php");
}

else if($_POST['fname']!=NULL && $_POST['Pass']==NULL )
{
$_SESSION['exist'] = '*Error* Field left empty';
$_SESSION['Ru']=0;
$_SESSION['Rp']=1;
header("location:sc1.php");
}




else if(is_numeric($my))
{
$_SESSION['exist'] = '*Error* Username must be alphanumeric';
$_SESSION['Ru']=1;
$_SESSION['Rp']=0;
header("location:sc1.php");
}
else if(ctype_punct($my))
{
$_SESSION['exist'] = '*Error* Username must be alphanumeric';
$_SESSION['Ru']=1;
$_SESSION['Rp']=0;
header("location:sc1.php");
}




else if(strlen($pass)<6)
{
$_SESSION['exist'] = '*Error* Password length too small<br>Length must be atleast 6 ';
$_SESSION['Ru']=0;
$_SESSION['Rp']=1;
header("location:sc1.php");
}
else{

$_SESSION['Ru']=0;
$_SESSION['Rp']=0;

//create the movie table
$query = 'CREATE TABLE '."$my".' (
	Id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	ContactName VARCHAR(255) NOT NULL,
	ContactID VARCHAR(255) NOT NULL,
    ContactNum VARCHAR(255) NOT NULL,
	Reminder VARCHAR(255) NOT NULL,
    RemindDate DATE NOT NULL,
	RemindTime TIME NOT NULL,
	PRIMARY KEY (Id),
	KEY ContactName (ContactName,ID)
)
ENGINE=MyISAM';
mysql_query($query, $db) or die (mysql_error($db));

$mk = $my.'P';

$query = 'CREATE TABLE '."$mk".' (
	Id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	UserName VARCHAR(255) NOT NULL DEFAULT 0,
	Post TEXT NOT NULL,
	Comment1 TEXT NOT NULL,
	Comment2 TEXT NOT NULL,
	Comment3 TEXT NOT NULL,
	Comment4 TEXT NOT NULL,
	Comment5 TEXT NOT NULL,
	Sender1 VARCHAR(255) NOT NULL,
	Sender2 VARCHAR(255) NOT NULL,
	Sender3 VARCHAR(255) NOT NULL,
	Sender4 VARCHAR(255) NOT NULL,
	Sender5 VARCHAR(255) NOT NULL,
	PRIMARY KEY (Id),
	KEY UserName (UserName,ID)
)
ENGINE=MyISAM';
mysql_query($query, $db) or die (mysql_error($db));






//echo 'Database successfully created!';

$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Users', $db) or die(mysql_error($db));
$query = 'INSERT INTO record
(Username , Pass)
	VALUES
	("' . $_POST['fname'] . '",
	"' . $_POST['Pass'] . '")';
		
mysql_query($query, $db) or die(mysql_error($db));


echo '<div class="mov">';
echo '<h2>Click here to switch to</h2><a href="loginsc.php"><h1>Login</h1></a><h2>page</h2>';
echo '</div>';

}
?>

</html>
</body>