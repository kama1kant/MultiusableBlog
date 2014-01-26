<html>
<title>Add Contact</title>

<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<?php
$fl=0;
session_start();
$_SESSION['Error']="";
$_SESSION['ErrorR']="";
$_SESSION['ECname']=0;
$_SESSION['ECnum']=0;
$_SESSION['ECid']=0;

$_SESSION['ERd']=0;
$_SESSION['ERt']=0;
$_SESSION['ERr']=0;


if(empty($_SESSION['username1']))
header("location:loginsc.php");
if(isset($_POST['back']))
{
if(empty($_SESSION['backk']))
$_SESSION['backk'] = $_POST['back'];
}
if(empty($_POST['back']) && empty($_SESSION['backk']))
{
header("location:tmpltsc.php");
}

$b=$_SESSION['backk'].'.JPG';


?>

<style type="text/css">


body
{
<?php 
echo 'background-image: url('.$b.');'; 
?>
background-position: 50% 50%;
background-repeat: no-repeat;
background-attachment: fixed;
}

</style>
</head>

<?php


if(empty($_SESSION['username1']))
header("location:loginsc.php");

?>

<body>

<a href="remindsc.php">Reminder</a>
<a href="homesc.php">Contacts</a>
<a href="postsc.php">Post</a>
<a href="tmpltsc.php">Template</a>
<a href="logoutsc.php">Logout</a>
<a href="resetsc.php">Password Reset</a>

<div class="srch">
<form action="srchusersc.php" method="post">
<b>Search User :</b> <input type="text" name="srch" />
<input type="submit" value="Search!" />
</form>
<?php
if(isset($_SESSION['search']))
echo $_SESSION['search'];

?>



</div>



<br>
<div class="name">
<?php
echo '<h1> Welcome '.$_SESSION['username1'].'</h1><br>To MULTI-USABLE BLOG';
?>
</div>

<div class="clock">
<?php

include("clocksc.php");

?>
</div>
<div class="date">

<?php echo '<br><b>'.date("l dS  F Y ");'</b>' ?>
</div>

<div class="rem">
<?php
$my = $_SESSION['username1'];
$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Users', $db) or die(mysql_error($db));
$query = "SELECT * FROM $my";
$result = mysql_query($query, $db) or die (mysql_error($db));
echo '<table  border="1">';
echo '<tr> <th colspan=3> TODAYS REMINDER</th></tr>';
echo '<tr>
<th>Remind Date</th>
<th>Remind Time</th>
<th>Reminder</th>
</tr>';


while ($row = mysql_fetch_assoc($result))
{
if($row['RemindDate'] == date("Y-m-d"))
{
$fl=1;
echo '<tr><td>';
echo $row['RemindDate'];
echo '</td><td>';
echo $row['RemindTime'];
echo '</td><td>';
echo $row['Reminder'];
echo '</td></tr>';
}
}
if($fl==0)
{
echo '<tr> <th colspan=3> No Reminder for Today </th></tr>';
}


echo '</table>';
?>







</div>


</body>
</html>