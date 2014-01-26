<?php
session_start();
$_SESSION['ErrorR'] = "";
$my = $_SESSION['username1'];
echo $my;
$db = mysql_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');
mysql_select_db('Users', $db) or die(mysql_error($db));
$y = $_POST['yy'];
$m = $_POST['mm'];
$d = $_POST['dd'];

$h = $_POST['hh'];
$mi = $_POST['mi'];
$s = $_POST['ss'];


$dat = $_POST['yy']."-".$_POST['mm']."-".$_POST['dd'];
$tim = $_POST['hh'].":".$_POST['mi'].":".$_POST['ss'];
if((empty($_POST['yy'])|| empty($_POST['mm']) || empty($_POST['dd'])) && (empty($_POST['hh'])|| empty($_POST['mi']) || empty($_POST['ss'])) && empty($_POST['remind']))
{
$_SESSION['ErrorR'] = '<i>*Error* Field left blank</i>';
echo 'Field left blank';
$_SESSION['ERd']=1;
$_SESSION['ERt']=1;
$_SESSION['ERr']=1;
header("location:remindsc.php");

}

else if(empty($_POST['yy'])|| empty($_POST['mm']) || empty($_POST['dd']))
{
$_SESSION['ErrorR'] = '<i>*Error* Field left blank</i>';
echo 'Field left blank';
$_SESSION['ERd']=1;
$_SESSION['ERt']=0;
$_SESSION['ERr']=0;
header("location:remindsc.php");

}

else if(empty($_POST['hh'])|| empty($_POST['mi']) || empty($_POST['ss']))
{
$_SESSION['ErrorR'] = '<i>*Error* Field left blank</i>';
echo 'Field left blank';
$_SESSION['ERd']=0;
$_SESSION['ERt']=1;
$_SESSION['ERr']=0;
header("location:remindsc.php");

}


else if(empty($_POST['remind']))
{
$_SESSION['ErrorR'] = '<i>*Error* Field left blank</i>';
echo 'Field left blank';
$_SESSION['ERd']=0;
$_SESSION['ERt']=0;
$_SESSION['ERr']=1;
header("location:remindsc.php");

}


else if($y<2011 || $y>2020)
{
$_SESSION['ErrorR'] = '<i>*Error* Wrong Date Format</i>';
echo 'Invalid Date';
$_SESSION['ERd']=1;
$_SESSION['ERt']=0;
$_SESSION['ERr']=0;
header("location:remindsc.php");

}

else if($m<1 || $m>12)
{
$_SESSION['ErrorR'] = '<i>*Error* Wrong Date Format</i>';
echo 'Invalid Date';
$_SESSION['ERd']=1;
$_SESSION['ERt']=0;
$_SESSION['ERr']=0;
header("location:remindsc.php");

}



else if($d<1 || $d>31)
{
$_SESSION['ErrorR'] = '<i>*Error* Wrong Date Format</i>';
echo 'Invalid Date';
$_SESSION['ERd']=1;
$_SESSION['ERt']=0;
$_SESSION['ERr']=0;
header("location:remindsc.php");
	
}


else if($h<0 || $h>23)
{
$_SESSION['ErrorR'] = '<i>*Error* Wrong Time Format</i>';
echo 'Invalid Date';
$_SESSION['ERd']=0;
$_SESSION['ERt']=1;
$_SESSION['ERr']=0;
header("location:remindsc.php");

}

else if($mi<0 || $mi>59)
{
$_SESSION['ErrorR'] = '<i>*Error* Wrong Time Format</i>';
echo 'Invalid Date';
$_SESSION['ERd']=0;
$_SESSION['ERt']=1;
$_SESSION['ERr']=0;
header("location:remindsc.php");

}



else if($s<1 || $s>59)
{
$_SESSION['ErrorR'] = '<i>*Error* Wrong Time Format</i>';
echo 'Invalid Date';
$_SESSION['ERd']=0;
$_SESSION['ERt']=1;
$_SESSION['ERr']=0;
header("location:remindsc.php");
	
}


else if(is_numeric($_POST['remind']))
{
$_SESSION['ErrorR'] = '<i>*Error* in Reminder <br> Some character must be alphabet</i>';
echo '*Error in Contact Name <br> Some character must be alphabet';
$_SESSION['ERd']=0;
$_SESSION['ERt']=0;
$_SESSION['ERr']=1;
header("location:remindsc.php");


}

else if(ctype_alpha($_POST['hh']) || ctype_alpha($_POST['mi']) || ctype_alpha($_POST['ss']))
{
$_SESSION['ErrorR'] = '<i>*Error* Alphabets cannot be used</i>';
echo 'Field left blank';
$_SESSION['ERd']=0;
$_SESSION['ERt']=1;
$_SESSION['ERr']=0;
header("location:remindsc.php");


}

else if(ctype_alpha($_POST['yy']) || ctype_alpha($_POST['mm']) || ctype_alpha($_POST['dd']))
{
$_SESSION['ErrorR'] = '<i>*Error* Alphabets cannot be used</i>';
echo 'Field left blank';
$_SESSION['ERd']=1;
$_SESSION['ERt']=0;
$_SESSION['ERr']=0;
header("location:remindsc.php");


}







else if(ctype_punct($_POST['yy'])|| ctype_punct($_POST['mm']) || ctype_punct($_POST['dd']))
{
$_SESSION['ErrorR'] = '<i>*Error* Special Characters cannot be used</i>';
echo 'Field left blank';
$_SESSION['ERd']=1;
$_SESSION['ERt']=0;
$_SESSION['ERr']=0;
header("location:remindsc.php");


}

else if(ctype_punct($_POST['hh']) || ctype_punct($_POST['mi']) || ctype_punct($_POST['ss']))
{
$_SESSION['ErrorR'] = '<i>*Error* Special Characters cannot be used</i>';
echo 'Field left blank';
$_SESSION['ERd']=0;
$_SESSION['ERt']=1;
$_SESSION['ERr']=0;
header("location:remindsc.php");


}

else if(ctype_punct($_POST['remind']))
{
$_SESSION['ErrorR'] = '<i>*Error* Special Characters cannot be used</i>';
echo 'Field left blank';
$_SESSION['ERd']=0;
$_SESSION['ERt']=0;
$_SESSION['ERr']=1;
header("location:remindsc.php");

}





else
{




$_SESSION['ERd']=0;
$_SESSION['ERt']=0;
$_SESSION['ERr']=0;
$query = 'INSERT INTO '."$my".'
(RemindDate , RemindTime , Reminder)
	VALUES
	("' . $dat . '",
	"' . $tim . '",
    "' . $_POST['remind'] . '")';
		
mysql_query($query, $db) or die(mysql_error($db));

echo 'Added';
header("location:remindsc.php");

}



?>