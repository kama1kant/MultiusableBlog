<html>
<head>
<style type="text/css">
body
{
background-image: url("4.JPG");
background-position: 50% 50%;
background-repeat: no-repeat;
}

</style>
</head>
<body>


<?php
session_start();
if(isset($_SESSION['username1']))
{
	unset($_SESSION['username1']);
	unset($_SESSION['backk']);
	unset($_SESSION['log']);
	unset($_SESSION['exist']);
}
echo "<center><br><br><br><br><br><br><br><br><br><br><br>Logout successful<br><br>";
echo "<a href='loginsc.php'><h2>Login again</h2></a></center>";
?>

</body>
</html>