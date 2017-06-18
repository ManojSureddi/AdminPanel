<?php
ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<?php
include "include/config.php";
if(isset($_POST['submit']))
{
	$uname=mysql_real_escape_string($_POST['uname']);
	$pass=mysql_real_escape_string($_POST['pass']);
	$res=mysql_query("SELECT * FROM `employee` WHERE `Emp_ID`='".$uname."' and `Password`='".$pass."'");
	
	if(mysql_affected_rows()==1)
	{
		$rowz=mysql_fetch_array($res);	
		echo $_SESSION['exec'] = $rowz['Emp_ID'];
		header("location: orderexecview.php");
	}
	else
	{
		echo "Invalid login details";
	}
}
?>
<body>
<div  style="width:400px; margin:auto">
<h4 align="center">Executive Login</h4>
<form  method="post" action="execlogin.php" style=" width:300px;margin:auto">
<input type="text" name="uname"  placeholder="name"/><br />
<input type="password" name="pass" placeholder="password" /><br />
<input type="submit" name="submit" value="Log In" class="submit" >
</form>
</div>
</body>
</html>
