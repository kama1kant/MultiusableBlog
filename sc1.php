<html>


<head>
<link rel="stylesheet" type="text/css" href="style3.css" />
</head>


<body>

<div class = "hdng">

<?php
session_start();
$_SESSION['log'] ="";
$_SESSION['Lu']=0;
$_SESSION['Lp']=0;
if(empty($_SESSION['Ru']))
$_SESSION['Ru']=0;

if(empty($_SESSION['Rp']))
$_SESSION['Rp']=0;


if(isset($_SESSION['exist']))
echo $_SESSION['exist'];
?>

</div>



	<center>
	<br><br><br><br><br><br><br><br><br>
		<div class="brdr">
		<form action="sc3.php" method="post">
			
			<table>
			
				<tr><th><h3>Register:</h3></tr>
				<tr><td><?php if($_SESSION['Ru']==1)echo '*'; ?>Username : <input type="text" name="fname" class="design3"/></tr>
				<tr><td><?php if($_SESSION['Rp']==1)echo '*'; ?>Password : <input type="password" name="Pass" class="design3"/></tr>
				<tr><td><td><input type="submit" value="Register!" /></tr>
			
			</table>
		
		</form>
		<h3>Login Page</h3>
		<form action="loginsc.php" method="post">
		<input type="submit" value="Login" />
		<br>
		</form>
	</center>
</div>
</body>
</html>