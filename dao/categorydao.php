<?php
  session_start();
 include('config.inc.php');
 include('includes/utilityfuntions.php');
 $restid=mysql_real_escape_string($_POST['catname']);
 $k=uniqueKeyGenerator($restid,uniqueKeyGenerator($restid,$restid));
 $opt=$_GET['opt'];
 if($opt==1){
	  $newcat=mysql_real_escape_string($_POST['catname']);
	  $res=mysql_query("UPDATE `item_type` SET `name`='".$newcat."' WHERE id='".$newcat."'");
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
	  $res=mysql_query("DELETE FROM `item_type` WHERE id='".$newcat."'");
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
		 else{
 
 
 
 $res=mysql_query("INSERT INTO `item_type`(`id`, `name`) VALUES ('".($k)."','".$restid."')");
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
 
header("location:index.php?page=".md5('addcat'));
?>
