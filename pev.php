<?php
session_start();
$_SESSION['bb']=0;
$my = $_SESSION['username'];
$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('users', $db) or die(mysql_error($db));

$query = "SELECT * FROM $my";
$result = mysql_query($query, $db) or die (mysql_error($db));

while ($row = mysql_fetch_assoc($result))
{
$b = $row['slno'];
break;
}

if($b==0)
{
$_SESSION['bb'] = 1;
header("location:kn3.php");
}




$query = "SELECT * FROM $my";
$result = mysql_query($query, $db) or die (mysql_error($db));

while ($row = mysql_fetch_assoc($result))
{
$e = $row['slno'];
}

$_SESSION['b'] = $b;
$_SESSION['e'] = $e;
$_SESSION['end'] = $e;
//header("location:dshow.php");

?>
<?php


$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('users', $db) or die(mysql_error($db));


$query = 'SELECT * FROM '."$my".' WHERE slno='.$_SESSION['e'];
$result = mysql_query($query, $db) or die (mysql_error($db));
while ($row = mysql_fetch_assoc($result))
{

$a= $row['date'];
$b= $row['heading'];
$c= $row['diary'];


}
$d=$_SESSION['e'];


?>
<html>
<head>
<style type="text/css">
body {
color:red;
background-image:url('n.jpg');}
h1 {
text-align:center;}
p.ex {color:blue;}

.margin
{
margin-top:200px;
margin-left:350px;
}
.ss{
position:fixed;
top:550px;
left:990px;

}
.xy
{
position:fixed;
top:90px;
left:530px;

}
.xx{position:fixed;
top:90px;
left:530px;}

</style>
<title> Diary Writing</title>
</head>
<body>

<h1 class="xx"> PERSONAL DIARY</h1>
<form action="kn4.php" method="post">
<table class="margin">




<tr>
<td>
<textarea cols="80" rows="10"
name="aim" readonly><?php

echo 'Date   :'.$a."\n";
echo 'Heading:'.$b."\n";
echo 'Diary  :'.$c."\n";
//echo $d;

 ?>  </textarea></td></tr>
 
 <tr>
 <td>
 </form>
  </td>
<td><form action="prev.php" method="post">
<input type= "submit" value="Previous"/></form></td>

 <td><form action="nxt.php" method="post"> <input type="submit" value="Next"/></form>


</td>
</tr><!--
<form action="kn15.php" method="post">
Enter date to be deleted :<input type="text" name="del_date" size="3" />
 <input type="submit" value="Delete"/>
 </form>
</td></tr>-->


<tr><td> <a href="kn3.php"><h2> Back</h2></a></td></tr>

</table>

</body>
</html>