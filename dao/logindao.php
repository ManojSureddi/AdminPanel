<?php
session_start();
include('config.inc.php');
$uname=mysql_real_escape_string($_POST['uname']);
$pass=mysql_real_escape_string($_POST['pass']);
//mysql_query("INSERT INTO `adminz`(`username`, `password`) VALUES ('adminzlogin','".md5('adminpasscode')."')");
$res=mysql_query("SELECT * FROM `adminz` WHERE `username`='".$_POST['uname']."'");
if(mysql_num_rows($res)==1){
	$row=mysql_fetch_array($res);
	if($row['password']==md5($pass)){
		$_SESSION['useradmin']=$row['username'];
		}
		else{
			$_SESSION['logstatus']=true;
			}
	}
	header("location: index.php");
?>