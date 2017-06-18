<?php
include('config.inc.php');
 
 $name=mysql_real_escape_string($_POST['empname']);


mysql_query("INSERT INTO `employee`(`Emp_ID`, `Emp_Name`, `Emp_Role`, `Phone`, `Password`, `Status`, `Area_Code`) VALUES (".($k+1).",'".$name."','".$emprole."','".$phone."','".$passwd."','".$status."','".$empareacode."')");
if(mysql_affected_rows())
{
	$_SESSION['status']=true;
}
 else
 {
 $_SESSION['status']=false;
 }
 
header("location:index.php?page=".md5('employee'));
?>