<html>
<body>
<h1> Choose any one Template for your Profile </h1>

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

$_SESSION['Lu']=0;
$_SESSION['Lp']=0;

if(empty($_SESSION['username1']))
header("location:loginsc.php");
if(isset($_SESSION['backk']))
{
unset($_SESSION['backk']);
}
?>


<form action="profilesc.php" method="post">
<table>
<tr><td>
<img border="0" src="m1.JPG" alt="Pulpit rock" width="304" height="228" />
</td>
<td>
<img border="0" src="m2.JPG" alt="Pulpit rock" width="304" height="228" />
</td>
<td>
<img border="0" src="m3.JPG" alt="Pulpit rock" width="304" height="228" />
</td></tr>
<tr><td>
<input type="radio" name="back" value="m1" />1<br />
</td>
<td>
<input type="radio" name="back" value="m2" />2<br />
</td>
<td>
<input type="radio" name="back" value="m3" />3<br />
</td></tr>
<input type="submit" value="Choose" />
</form>
</body>
</html>