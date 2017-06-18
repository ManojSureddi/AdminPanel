<!-- Author: Manoj Sureddi
Facebook: https://www.facebook.com/manoj.sureddi
Email: manoj.wolverine8@gmail.com
Description:This page is for the development of admin panel for getmefood.in
-->
<?php
include "config.inc.php";
 $a= @$_POST['r'];
  $b=@$_POST['sel'];
 $c=@$_POST['pq'];
 echo $a." ".$b." ".$c;
 if($c==0){
 mysql_query("UPDATE `orders` SET  `Assigned_Executive`='".$b."' WHERE `Order_Id`='".$a."'");
 echo mysql_affected_rows();
}
 else if($c==5){
 mysql_query("UPDATE `orders` SET  `Assigned_Executive` = '' WHERE `Order_Id`='".$a."'");
 echo mysql_affected_rows();
}
else if($c==1){
 if($b==1){
 mysql_query("UPDATE `orders` SET `Order_Status`='CONFIRMED' WHERE `Order_Id`='".$a."'");
 echo mysql_affected_rows();

 }
 else
 {
	  mysql_query("UPDATE `orders` SET `Order_Status`='CANCELED' WHERE `Order_Id`='".$a."'");
 echo mysql_affected_rows();


 }
}
else if($c==2){
 if($b==1){
	  $d=$_POST['cos'];
	 mysql_query("INSERT INTO `order_bill`(`Order_Id`, `Order_Cost`, `Delivery_Charges`, `Coupon_Value`, `Tax`, `Collect_From_Customer`, `Pay_To_Restaurant`, `Payment_Type`)
	  VALUES ('".$a."','1','1','1','1','1','".$d."','1')");
	  
 mysql_query("UPDATE `orders` SET `Order_Status`='PLACED' WHERE `Order_Id`='".$a."'");
 echo mysql_affected_rows();

 }
 else
 {
	 	  mysql_query("UPDATE `orders` SET `Order_Status`='CANCELED' WHERE `Order_Id`='".$a."'");
 echo mysql_affected_rows();


 }
}
else if($c==3){
	
 mysql_query("UPDATE `orders` SET `Order_Status`='YET_TO_DISPATCH' , `Assigned_Delivery_Boy`= '".$b."' WHERE `Order_Id`='".$a."'");
  echo mysql_affected_rows();
}
else if($c==4){
 mysql_query("UPDATE `orders` SET `Order_Status`='IN_TRANSIT' WHERE `Order_Id`='".$a."'");
  echo mysql_affected_rows();
}
/*if($c==5){
 mysql_query("UPDATE `orders` SET `Order_Status`='PLACED' , `Assigned_Delivery_Boy`= '' WHERE `Order_Id`='".$a."'");
  echo mysql_affected_rows();
}*/
else if($c==6){
	
 mysql_query("UPDATE `orders` SET `Order_Status`='DELIVERED',`delvery_time`= '".$b."' WHERE `Order_Id`='".$a."'");
  echo mysql_affected_rows();
}


?>