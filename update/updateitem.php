<?php
include "include/config.php";
$q=$_GET['q'];
$sql="SELECT * FROM `restaurantmenuinformation` WHERE `item_id`='".trim($_POST['itemslist'])."'";
$res = mysql_query($sql);
$row=mysql_fetch_array($res);


mysql_query("INSERT INTO `order_contents`(`Order_Id`, `Item_Code`, `Item_Name`, `Iteam_Cost`, `Item_Quantity`, `Total_Item_Cost`)
             VALUES ('".$q."','".$_POST['itemslist']."','".$row['item_name']."','".$row['price']."','".$_POST['qtyz']."','".($row['price']*$_POST['qtyz'])."')");
	header("location: fetchresults.php?q=".$q);		 
?>