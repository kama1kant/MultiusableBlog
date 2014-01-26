<?php
session_start();
$_SESSION['Error']="";
$my = $_SESSION['username1'];
echo $my;
$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Users', $db) or die(mysql_error($db));
$str = (string)$_POST['num'];
$fofo=0;
if(empty($_POST['name']) && isset($_POST['id']) && isset($_POST['num']))
{
$_SESSION['Error'] = '<i>*Error* Field left blank</i>';
echo 'Field left blank';
$_SESSION['ECname']=1;
$_SESSION['ECnum']=0;
$_SESSION['ECid']=0;
header("location:homesc.php");
}


else if(empty($_POST['num']) && isset($_POST['name']) && isset($_POST['id']) )
{
$_SESSION['Error'] = '<i>*Error* Field left blank</i>';
echo 'Field left blank';
$_SESSION['ECname']=0;
$_SESSION['ECnum']=1;
$_SESSION['ECid']=0;
header("location:homesc.php");
}


else if(empty($_POST['id']) && isset($_POST['name']) && isset($_POST['num']) )
{
$_SESSION['Error'] = '<i>*Error* Field left blank</i>';
echo 'Field left blank';
$_SESSION['ECname']=0;
$_SESSION['ECnum']=0;
$_SESSION['ECid']=1;
header("location:homesc.php");
}


else if(empty($_POST['name']) || empty($_POST['id']) || empty($_POST['num']))
{
$_SESSION['Error'] = '<i>*Error* Field left blank</i>';
echo 'Field left blank';
$_SESSION['ECname']=1;
$_SESSION['ECnum']=1;
$_SESSION['ECid']=1;
header("location:homesc.php");
}




else if(ctype_alpha($_POST['num']))
{
$_SESSION['Error'] = '<i>*Error* in Contact Number <br> Alphabets cannot be used</i>';

$_SESSION['ECname']=0;
$_SESSION['ECnum']=1;
$_SESSION['ECid']=0;
header("location:homesc.php");
}


else if(ctype_punct($_POST['num']))
{
$_SESSION['Error'] = '<i>*Error* in Contact Number <br> Special Characters not allowed</i>';
$_SESSION['ECname']=0;
$_SESSION['ECnum']=1;
$_SESSION['ECid']=0;
header("location:homesc.php");
}

else if(strlen($str)<10 || strlen($str)>10)
{
$_SESSION['Error'] = '<i>*Error* in Contact Number <br> Length must be 10</i>';
echo '*Error in Contact Number <br> Length must be 10';
$_SESSION['ECnum']=1;
$_SESSION['ECname']=0;
$_SESSION['ECid']=0;
header("location:homesc.php");
}


else if(is_numeric($_POST['name']))
{
$_SESSION['Error'] = '<i>*Error* in Contact Name <br> Some character must be alphabet</i>';
echo '*Error in Contact Name <br> Some character must be alphabet';
$_SESSION['ECname']=1;
$_SESSION['ECnum']=0;
$_SESSION['ECid']=0;
header("location:homesc.php");
}


else if(ctype_punct($_POST['name']))
{
$_SESSION['Error'] = '<i>*Error* in Contact Name <br> Special Characters not allowed</i>';
$_SESSION['ECname']=1;
$_SESSION['ECnum']=0;
$_SESSION['ECid']=0;
header("location:homesc.php");
}


else if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)*.([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/" , $_POST['id'])) 
{
echo "false";
$_SESSION['Error'] = '<i>*Error* in Email-Id <br></i>';
$_SESSION['ECname']=0;
$_SESSION['ECnum']=0;
$_SESSION['ECid']=1;
header("location:homesc.php");
}

else
{
if(is_numeric($_POST['num']))
{

$query = 'INSERT INTO '."$my".'
(ContactName , ContactID , ContactNum)
	VALUES
	("' . $_POST['name'] . '",
	"' . $_POST['id'] . '",
    ' . $_POST['num'] . ')';
		
mysql_query($query, $db) or die(mysql_error($db));

echo 'Added';
header("location:homesc.php");
}
else
{
$_SESSION['Error'] = '<b>*Error* in Contact Number <br> Some character is be alphabet</b>';
echo '*Error in Contact Name <br> Some character must be alphabet';
$_SESSION['ECname']=0;
$_SESSION['ECnum']=1;
$_SESSION['ECid']=0;
header("location:homesc.php");

}
}

?>