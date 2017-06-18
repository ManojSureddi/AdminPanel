<?php
  session_start();
 include('config.inc.php');
 include('includes/utilityfuntions.php');
 $restid=mysql_real_escape_string($_POST['cityname']);
 $k=uniqueKeyGenerator($restid,uniqueKeyGenerator($restid,$restid));
 
  $opt=$_GET['opt'];
 if($opt==1){
	  $newcat=mysql_real_escape_string($_POST['catid']);
	  $newname=mysql_real_escape_string($_POST['newname']);
	  $res=mysql_query("UPDATE `cities` SET `city`='".$newname."' WHERE id='".$newcat."'");
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
	 else if($opt==2){
		 	  $newcat=mysql_real_escape_string($_POST['catid']);
	  $res=mysql_query("DELETE FROM `cities` WHERE id='".$newcat."'");
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
 
 
  $res=mysql_query("INSERT INTO `cities`(`id`, `city`) VALUES ('".$k."','".$restid."')");
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
header("location:index.php?page=".md5('addCity'));
?>