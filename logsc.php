<html>
<body>
<?php
session_start();
$_SESSION['exist'] = "";
$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Users', $db) or die(mysql_error($db));
// select the movie titles and their genre after 1990


function usname_exist($username)
{
	
	$q="SELECT * FROM record WHERE Username='$username'";
	$result=mysql_query($q);
	return (mysql_numrows($result)>0);
}
/**
 * function to check weather given password is correct or not
 * returns true on success
 */
function check_passwd($username,$password)
{
	
	$q="SELECT * FROM record WHERE Username='$username'";
	$result=mysql_query($q);
	$row=mysql_fetch_array($result);
	return ($row['Pass']==$password);
}
$u=$_POST['user'];
$p=$_POST['pass'];

if($_POST['user']==NULL && $_POST['pass']==NULL )
{
$_SESSION['log'] = "*Error* Field left empty";
		$_SESSION['Lp']=1;
		$_SESSION['Lu']=1;
header("location:loginsc.php");
}

else if($_POST['user']==NULL && $_POST['pass']!=NULL )
{
$_SESSION['log'] = "*Error* Field left empty";
		$_SESSION['Lp']=0;
		$_SESSION['Lu']=1;
header("location:loginsc.php");
}

else if($_POST['user']!=NULL && $_POST['pass']==NULL )
{
$_SESSION['log'] = "*Error* Field left empty";
		$_SESSION['Lp']=1;
		$_SESSION['Lu']=0;
header("location:loginsc.php");
}


else if(usname_exist($u))
{
	if(!check_passwd($u,$p))
	{
		echo "wrong password entered<br>redirecting you to login....";
		$_SESSION['log'] = "*Error* wrong password entered<br>redirecting you to login....";
		$_SESSION['Lp']=1;
		$_SESSION['Lu']=0;
header("location:loginsc.php");
	}
	else
	{
		$_SESSION['username1']=$u;
		$_SESSION['count']=1;
		$_SESSION['flag']=0;
		$_SESSION['Lu']=0;
		$_SESSION['Lp']=0;
		header("location:tmpltsc.php");
	}
}


else
{
echo "Username not found<br>redirect to login page...";
$_SESSION['log'] = "*Error* Username not found<br>redirect to login page...";
$_SESSION['Lu']=1;
$_SESSION['Lp']=0;
header("location:loginsc.php");
}


?>
</body>
</html>