<html>
<title>Login</title>


<head>
<link rel="stylesheet" type="text/css" href="style3.css" />
</head>
<body>
	<div class = "hdng">
<?php
session_start();
$_SESSION['exist'] ="";
$_SESSION['Ru']=0;
$_SESSION['Rp']=0;

if(empty($_SESSION['Lu']))
$_SESSION['Lu']=0;

if(empty($_SESSION['Lp']))
$_SESSION['Lp']=0;


if(isset($_SESSION['log']))
echo "<br><b>".$_SESSION['log']."</b>";
?>

</div>



	<center>
	<br><br><br><br><br><br><br><br>
		<div class="brdr">
		<form action="logsc.php" method="post">
			<table>
			
				<tr><th><h3>User Login:</h3></tr>
				</div>
				<tr><td><?php if($_SESSION['Lu']==1)echo '*'; ?>Username:<td><input type="text" name="user" class="design3"/></tr>
				<tr><td><?php if($_SESSION['Lp']==1)echo '*'; ?>Password:<td><input type="password" name="pass" class="design3"/></tr>
				<tr><td><td><input type="submit" value="Login!" /></tr>
			</table>
		</form>
		<h3>Do you want to create a new account</h3>
		<form action="sc1.php" method="post">
		<input type="submit" value="Register" />
		<br>
		</form>
	</center>





	
</body>
</html>

