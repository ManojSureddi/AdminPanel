<?php
  session_start();
include('config.inc.php');
 include('includes/utilityfuntions.php');

 $opt=@$_GET['opt'];
 $name=mysql_real_escape_string($_POST['empname']);
$emprole=mysql_real_escape_string($_POST['role']);
$phone=mysql_real_escape_string($_POST['empphn']);
$passwd=mysql_real_escape_string($_POST['emppass']);
$status=mysql_real_escape_string($_POST['status']);
$empareacode=mysql_real_escape_string($_POST['areacode']);

 $k=uniqueKeyGenerator($name.$phone,uniqueKeyGenerator($phone,$passwd));
mysql_query("INSERT INTO `employee`(`Emp_ID`, `Emp_Name`, `Emp_Role`, `Phone`, `Password`, `Status`, `Area_Code`) VALUES ('".$k."','".$name."','".$emprole."','".$phone."','".$passwd."','WORKING','".$empareacode."')");
echo mysql_affected_rows();
if(mysql_affected_rows()>0)
{
	$_SESSION['status']=true;
}
 else
 {
 $_SESSION['status']=false;
 }
 
header("location:index.php?page=24cef61c4102fbfb69d9d12e0228478c");
?>