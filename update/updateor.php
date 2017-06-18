<?php
$k= $_POST['qty'];
$q=$_GET['q'];
include "include/config.php";
$res=mysql_query("SELECT * FROM `order_contents` WHERE `Order_Id`='".$q."'");
$cnt=0;

while($row=mysql_fetch_array($res))
{
	$sql="SELECT * FROM `restaurantmenuinformation` WHERE `item_id`='".$row['Item_Code']."'";
$res1 = mysql_query($sql);
$row1=mysql_fetch_array($res1);

	if($row['Item_Quantity']!=0)
	$l=($row1['price']/$row['Item_Quantity'])*$k[$cnt];
	else
	$l=($row1['price'])*$k[$cnt];
	mysql_query("UPDATE `order_contents` SET `Iteam_Cost`='".$l."',`Item_Quantity`='".$k[$cnt]."' WHERE `Order_Id`='".$q."' and `Item_Code`='".$row['Item_Code']."'");
	$cnt++;
}
	header("location: fetchresults.php?q=".$q);		 

?>