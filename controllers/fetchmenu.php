<?php
include "config.inc.php";
 echo $q=$_POST['q'];
 echo  $str=$_POST['str'];
 $res=mysql_query("SELECT * FROM `orders` WHERE `Order_Id`='".$q."'");
$row=mysql_fetch_array($res);
$res1=mysql_query("SELECT * FROM `restaurant_menu` WHERE `restaurant_id`='".$row['Restaurant_Id']."' and Name like'".$str."%'");

while($rowz=mysql_fetch_array($res1))
{
	echo '<option value="'.$rowz['Item_Code'].'">'.$rowz['Item_Code'].'</option>';
}
?>