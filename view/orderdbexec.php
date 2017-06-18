<!--
 Author: Manoj Sureddi
Facebook: https://www.facebook.com/manoj.sureddi
Email: manoj.wolverine8@gmail.com
Description:This page is for the development of admin panel for getmefood.in
-->
<?php
session_start();
include "include/config.php";
?>
<style>
body
{
	background:#FFF;
}
</style>
  <table border="0" cellspacing="5" cellpadding="10">
        <tr>
        <th align="center">Order Id</th>
        <th align="center">Time Of Order</th>
        <th align="center">Order Status</th>
        <th align="center">Area</th>
        <th align="center">Restaurant Id</th>
        <th align="center">Restaurant Name</th>

        <th align="center">Custumer Number</th>
        <th align="center">Custumer Name</th>
<th align="center" >Assigned Executive</th>

        <th align="center" >Assigned Delivery Boy</th>
        <th align="center" ></th>
        <th align="center" ></th>
        
                <th align="center" ></th>
        <th align="center" ></th>
</tr>

<?php


 $optz=$_POST['optionz'];
 $name=explode(",",$optz);
/* echo print_r($name);*/
 $count=0;

 
for($i=0;$i<count($name);$i++){

	 $lg=@$_POST['workfromdate'];
	if(isset($lg))
	{	
		if( $name[$i]=="All")
			{
				$res=mysql_query("SELECT * FROM `orders` WHERE  `Order_Time` ='".$lg."'");	
			}
		        else  if($name[$i]=="PLACED")
					{
						$res=mysql_query("SELECT * FROM `orders` WHERE `Order_Status`='".$name[$i]."' and `Order_Time` ='".$lg."'");	
					}
	       else
        $res=mysql_query("SELECT * FROM `orders` WHERE `Order_Status`='".$name[$i]."' and `Order_Time` ='".$lg."' and `Assigned_Executive`='".$_SESSION['exec']."'");	
	}
	else{	
				if($name[$i]=="All")
					{
						$res=mysql_query("SELECT * FROM `orders`");	
					}
	            	else if($name[$i]=="PLACED")
					{
						$res=mysql_query("SELECT * FROM `orders` WHERE `Order_Status`='".$name[$i]."'");	
					}
					else
				$res=mysql_query("SELECT * FROM `orders` WHERE `Order_Status`='".$name[$i]."' and `Assigned_Executive`='".$_SESSION['exec']."'");

					}

$op=$name[$i];

while($row=mysql_fetch_array($res))
{
	echo "<tr>";
	echo '<td><a style="width:70px;" id="various'.$count.'" href="fetchresults.php?q='.$row[0].'" class="submit" >'.$row[0].'</a></td>';
	echo "<td>".$row[1]."</td>";

		echo "<td>".$row['Order_Status']."</td>";
			echo "<td>".$row['Area_Name']."</td>";
			echo "<td>".$row['Restaurant_Id']."</td>";
			echo "<td>".$row['Restaurant_Name']."</td>";
	$res1=mysql_query("SELECT * FROM `user_information` WHERE `user_id`='".$row['Customer_Id']."'");
	 $row1=mysql_fetch_array($res1);
	 echo "<td>".$row['mobile']."</td>";
	echo "<td>".$row1['name']."</td>";
	echo "<td>".$row['Assigned_Executive']."</td>";
	
	echo "<td>".$row['Assigned_Delivery_Boy']."</td>";
	
	
if($op=="INPROCESS"){
	
echo '
	
	<td>
	<select name="sel" id="seli'.$row[0].'">
	<option value="">Action Please</option>
	<option value="1">Confirm</option>
	<option value="2">Cancel</option>
	</select>
	</td>
	<td><input type="submit" value="OK" class="submit" onclick="callit(1,'.$row[0].')" ></td>

	</tr>';
}

if($op=="CONFIRMED"){

	echo '
	<td><input id="cos'.$row[0].'" type="datetime" name="hello" placeholder="Cost from Restaurant">	</td>
	<td>
	<select name="sel" id="sel'.$row[0].'">
	<option value="">Action Please</option>
	<option value="1">Placed</option>
	<option value="2">Cancel</option>
	</select>
	</td>
	<td><input type="submit" value="OK" class="submit" onclick="callit(2,'.$row[0].')" ></td>
		<td></td>
			<td></td>
	</tr>';
}
if($op=="PLACED"){
$re=mysql_query("SELECT * FROM `employee` WHERE `Emp_Role`='del'");
	
	echo '<td>

            </td>
	
	<td></td>
		
	<td></td>
	</form>
	</tr>';
}

if($op=="ALL"){
	echo '<td>

	</td>
	</tr>';
}
if($op=="DELIVERED"){
	echo '<td>

	</td>
	<td></td>
<td></td>
<td></td>

	</tr>';
}
	$count++;
}
}
?>      

</table>