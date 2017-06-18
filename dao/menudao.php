<?php
  session_start();
include('config.inc.php');
$restid=mysql_real_escape_string($_POST['restid']);
$itemtype=mysql_real_escape_string($_POST['itemtype']);
$itemname=mysql_real_escape_string($_POST['itemname']);
$itemprice=mysql_real_escape_string($_POST['itemprice']);
$desc=mysql_real_escape_string($_POST['description']);
$status=mysql_real_escape_string($_POST['status']);

$itemid=hash("SHA256",$restid.$itemname.$itemprice.rand());
$ctycode=substr($itemid,rand(0,strlen($itemid)-6),6);
 $res=mysql_query("INSERT INTO `restaurant_menu`(`Item_Code`, `Restaurant_Id`, `Item_Type`, `Name`, `Price`, `Description`, `Item_State`) VALUES ('".$ctycode."','".$restid."','".$itemtype."','".$itemname."','".$itemprice."','".$desc."','".$status."')");
 if(mysql_affected_rows())
{
	$_SESSION['status']=true;
}
 else
 {
 $_SESSION['status']=false;
 }
 
//header("location:index.php?page=".md5('menu'));
?>