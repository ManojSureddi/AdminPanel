<?php
  session_start();
 include('config.inc.php');
 include('includes/utilityfuntions.php');

 
  $opt=$_GET['opt'];
 if($opt==1){
	  $newcat=mysql_real_escape_string($_POST['catid']);
 $status=mysql_real_escape_string($_POST['status']);
 $reason=mysql_real_escape_string($_POST['reason']);
	  $res=mysql_query("UPDATE `areas` SET `Status`='".$status."',`Reason`='".$reason."' WHERE Area_Code='".$newcat."'");
 echo mysql_affected_rows();
 echo mysql_error();
 if(mysql_affected_rows()==1)
{
	$_SESSION['status']=true;
}
 else
 {
 $_SESSION['status']=false;
 }
	 }else{

  $cityname=mysql_real_escape_string($_POST['cityname']);
 $areaname=mysql_real_escape_string($_POST['areaname']);
 $desc=mysql_real_escape_string($_POST['desc']);
 $status=mysql_real_escape_string($_POST['status']);
 $reason=mysql_real_escape_string($_POST['reason']);
  $res=mysql_query("INSERT INTO `areas`(`Area_Code`, `City_Name`, `Area_Name`, `Description`, `Status`, `Reason`) VALUES ('".$k."','".$cityname."','".$areaname."','".$desc."','".$status."','".$reason."')");
 echo mysql_affected_rows();
 echo mysql_error();
 if(mysql_affected_rows()==1)
{
	$_SESSION['status']=true;
}
 else
 {
 $_SESSION['status']=false;
 }
		 }
header("index.php?page=6b7ef49830c9459829b92f616d84942e");
?>