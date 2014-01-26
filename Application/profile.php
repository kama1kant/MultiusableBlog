<html>
<head>
<style type="text/css">
body {
color:brown;
background-image:url('pro1.jpg');}
h1 {
text-align:center;}
p.ex {color:blue;}

.margin
{
margin-top:250px;
margin-left:500px;
}
.xy
{
position:fixed;
top:50px;
left:400px;

}
.ss{
position:fixed;
top:90px;
left:530px;
}
.rr
{position:fixed;
top:120px;
left:920px;}
.pp
{position:fixed;
top:120px;
left:970px;}
.nn
{position:fixed;
top:120px;
left:1060px;}

.jj
{position:fixed;
top:120px;
left:1150px;}

</style>
</head>
<body>


<h1>Profile page of</h1>
<?php 
session_start();
$_SESSION['a']="";
echo '<h1 class="ss">'.$_SESSION['username'] .'</h1>' ; 

?>
<a href="kn3.php"><h3 class="rr">Diary</h3></a>
<a href="kn6.php"><h3 class="pp">Dictionary</h3></a>
<a href="nnn3.php"><h3 class="nn">Calculator</h3></a>
<a href="logoutsc.php"><h3 class="jj">Logout</h3></a>
<h2 class="xy"> <?php echo date("Y/m/d");?></h2>


</body>

</html>