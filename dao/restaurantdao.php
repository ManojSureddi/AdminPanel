<?php
  session_start();
 include('config.inc.php');
 $re=mysql_query("SELECT * FROM `restaurants`");
 $k=mysql_num_rows($re);
 
$name=mysql_real_escape_string($_POST['restname']);
$citycode=hash("SHA256",rand().mysql_real_escape_string($_POST['areacode']).rand());
$ctycode=substr($citycode,rand(0,strlen($citycode)-6),6);
$areacode=mysql_real_escape_string($_POST['areacode']);
$contactname=mysql_real_escape_string($_POST['contactname']);
$phn1=mysql_real_escape_string($_POST['phone1']);
$phn2=mysql_real_escape_string($_POST['phone2']);
$address=mysql_real_escape_string($_POST['address']);
$status=mysql_real_escape_string($_POST['status']);
$reason=mysql_real_escape_string($_POST['reason']);
$tstart1=mysql_real_escape_string($_POST['tstart1']);
$tend1=mysql_real_escape_string($_POST['tend1']);
$tstart2=mysql_real_escape_string($_POST['tstart2']);
$tend2=mysql_real_escape_string($_POST['tend2']);

$res=mysql_query("SELECT * FROM `restaurants` where Phone1='".$phn1."' or Address='".$address."'");
if(mysql_affected_rows()==0){
 mysql_query("INSERT INTO `restaurants`(`Restaurant_Id`, `Name`, `Contact_Person`, `Phone1`, `Phone2`, `Address`, `Status`, `Reason`, `Time_Slot_1_ST`, `Time_Slot_1_ET`, `Time_Slot_2_ST`, `Time_Slot_2_ET`) VALUES ('".$ctycode."','".$name."','".$contactname."','".$phn1."','".$phn2."','".$address."','".$status."','".$reason."','".$tstart1."','".$tend1."','".$tstart2."','".$tend2."')");
if(mysql_affected_rows())
{
	 mysql_query("INSERT INTO `area_restaurant`(`Area_Code`, `Restaurant_Id`) VALUES ('".$areacode."','".$ctycode."')");
	$_SESSION['status']=true;
}
 else
 {
 $_SESSION['status']=false;
 }
 }else{
  $_SESSION['status']=false;
 }
header("location:index.php?page=".md5('restaurant'));
?>