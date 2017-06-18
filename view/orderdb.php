<!-- Author: Manoj Sureddi
Facebook: https://www.facebook.com/manoj.sureddi
Email: manoj.wolverine8@gmail.com
Description:This page is for the development of admin panel for getmefood.in
-->
<?php
include "config.inc.php";
?>
<style>

</style>
  <table border="0" cellspacing="5" cellpadding="10" width="1100px;">
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
        <th align="center" ></th>
</tr>

<?php


$optz=@$_POST['optionz'];
$name=@explode(",",$optz);
/* echo print_r($name);*/
$search=@$_POST['search'];
if(isset($search)){
 $count=0;
 	$sql_d = "SELECT * FROM orders where Order_Id='".$search."' or Customer_Id='".$search."' or Restaurant_Name='".$search."' or Area_Name='".$search."'"; 
	$res_result = mysql_query ($sql_d);
	
 	while ($row = mysql_fetch_assoc($res_result)) {	
	echo "<tr>";
	echo '<td><a style="width:55px;" id="various'.$count.'" href="fetchresults.php?q='.$row['Order_Id'].'" class="submit" >'.$row['Order_Id'].'</a></td>';
	echo "<td>".$row['Order_Time']."</td>";
echo "<td>".$row['Order_Status']."</td>";
			echo "<td>".$row['Area_Name']."</td>";
			echo "<td>".$row['Restaurant_Id']."</td>";
			echo "<td>".$row['Restaurant_Name']."</td>";
	$res1=mysql_query("SELECT * FROM `users` WHERE `user_id`='".$row['Customer_Id']."'");
	 $row1=mysql_fetch_array($res1);
	 echo "<td>".$row1['Contact']."</td>";
	echo "<td>".$row1['Name']."</td>";
	echo "<td>".$row['Assigned_Executive']."</td>";
		echo "<td>".$row['Assigned_Delivery_Boy']."</td>";
	echo "<td></td>";
	$op=$row['Order_Status'];
	
if($op=="INPROCESS" && $row['Assigned_Executive']==""){
	$re=mysql_query("SELECT * FROM `employee` WHERE `Emp_Role`='E'");
echo '
<td>
		<select name="sel" id="sel'.$row['Order_Id'].'">
	';
	if(count(mysql_fetch_array($re)))
while($ro=mysql_fetch_array($re))
	{
		echo '	<option value="'.$ro[0].'"><div>'.$ro[1].",<br>".$ro['Phone'].'</div></option>';
	}
	echo '
	</select>
            </td>
	<td><input type="submit" value="Assign Executive" class="submit" onclick="callit(0,\''.$row['Order_Id'].'\')" ></td>
	
	<td>
	<select name="sel" id="seli'.$row['Order_Id'].'">
	<option value="">Action Please</option>
	<option value="1">Confirm</option>
	<option value="2">Cancel</option>
	</select>
	</td>
	<td><input type="submit" value="OK" class="submit" onclick="callit(1,\''.$row['Order_Id'].'\')" ></td>

	</tr>';
}

else if($op=="ASSIGNED")
{
	echo '
	<td>
	<input type="submit" value="Revoke" class="submit" onclick="callit(5,\''.$row['Order_Id'].'\')" >
	</td>
	<td></td>
	<td></td>
	<td></td>
</tr>
';
}
if($op=="CONFIRMED"){

	echo '
	<td><input id="cos'.$row['Order_Id'].'" type="datetime" name="hello" placeholder="Cost from Restaurant">	</td>
	
	<td>
	<select name="sel" id="sel'.$row['Order_Id'].'">
	<option value="">Action Please</option>
	<option value="1">Placed</option>
	<option value="2">Cancel</option>
	</select>
	</td>
	<td><input type="submit" value="OK" class="submit" onclick="callit(2,\''.$row['Order_Id'].'\')" ></td>
		<td></td>
			<td></td>
	</tr>';
}
if($op=="PLACED"){
$re=mysql_query("SELECT * FROM `employee` WHERE `Emp_Role`='D'");
	
	echo '<td>

	
	<form method="post" action="">
		<select name="sel" id="sel'.$row['Order_Id'].'">


	
	';
	
	while($ro=mysql_fetch_array($re))
	{
		echo '	<option value="'.$ro[0].'">'.$ro[1].",\n".$ro['Phone'].'</option>';
	}
	echo '
	</select>
            </td>
	
	<td>  <input type="submit" value="Assign Delivery Boy" class="submit" onclick="callit(3,\''.$row['Order_Id'].'\')"></td>
	<td></td>
		<td></td>
	</form>
	</tr>';
}
if($op=="YET_TO_DISPATCH"){
	echo '<td>
	<form method="post" action="">
        <input type="submit" value="IN_TRANSIT" class="submit" onclick="callit(4,\''.$row['Order_Id'].'\')" ></td>
	</form>
	<td></td>
	</tr>';
}
if($op=="IN_TRANSIT"){
	echo '<td>
	<form method="post" action="">
	<td><input id="sel'.$row['Order_Id'].'" type="text" name="hello" placeholder="Delivered Time">	</td>
     <td>   <input type="submit" value="Delivered" class="submit" onclick="callit(6,\''.$row['Order_Id'].'\')" >
	</form>
	</td>
	<td></td>
	<td></td>
	</tr>';
}
if($op=="CANCELED"){
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
 
 
 
 
 
 
 

 else{
	 
	 
	 
	  $count=0;
for($i=0;$i<count($name);$i++){
	 $lg=@$_POST['workfromdate'];

	if(isset($lg))
	{
		
$res=mysql_query("SELECT * FROM `orders` WHERE `Order_Status`='".$name[$i]."' and `Order_Time` ='".$lg."'");	
	}
	else{	
	
if($name[$i]=="ASSIGNED")
	{
		$res=mysql_query("SELECT * FROM `orders` WHERE `Order_Status`='INPROCESS' and `Assigned_Executive` <> '' ");

	}
	else if($name[$i]=="INPROCESS"){
$res=mysql_query("SELECT * FROM `orders` WHERE `Order_Status`='".$name[$i]."' and `Assigned_Executive`=''");
	}
		else if(isset($search)){
$res=mysql_query("SELECT * FROM `orders` ");
	}
	else
	{
		$res=mysql_query("SELECT * FROM `orders` WHERE `Order_Status`='".$name[$i]."'");
	}
	}

$op=$name[$i];

while($row=mysql_fetch_array($res))
{
	echo "<tr>";
	echo '<td><a style="width:55px;" id="various'.$count.'" href="fetchresults.php?q='.$row['Order_Id'].'" class="submit" >'.$row['Order_Id'].'</a></td>';
	echo "<td>".$row['Order_Time']."</td>";
echo "<td>".$row['Order_Status']."</td>";
			echo "<td>".$row['Area_Name']."</td>";
			echo "<td>".$row['Restaurant_Id']."</td>";
			echo "<td>".$row['Restaurant_Name']."</td>";
	$res1=mysql_query("SELECT * FROM `users` WHERE `user_id`='".$row['Customer_Id']."'");
	 $row1=mysql_fetch_array($res1);
	 echo "<td>".$row1['Contact']."</td>";
	echo "<td>".$row1['Name']."</td>";
	echo "<td>".$row['Assigned_Executive']."</td>";
		echo "<td>".$row['Assigned_Delivery_Boy']."</td>";
	echo "<td></td>";
	
	
if($op=="INPROCESS" && $row['Assigned_Executive']==""){
	$re=mysql_query("SELECT * FROM `employee` WHERE `Emp_Role`='E'");
echo '
<td>
		<select name="sel" id="sel'.$row[0].'">
	';
	if(count(mysql_fetch_array($re)))
while($ro=mysql_fetch_array($re))
	{
		echo '	<option value="'.$ro[0].'"><div>'.$ro[1].",<br>".$ro['Phone'].'</div></option>';
	}
	echo '
	</select>
            </td>
	<td><input type="submit" value="Assign Executive" class="submit" onclick="callit(0,\''.$row[0].'\')" ></td>
	
	<td>
	<select name="sel" id="seli'.$row[0].'">
	<option value="">Action Please</option>
	<option value="1">Confirm</option>
	<option value="2">Cancel</option>
	</select>
	</td>
	<td><input type="submit" value="OK" class="submit" onclick="callit(1,\''.$row[0].'\')" ></td>

	</tr>';
}

else if($op=="ASSIGNED")
{
	echo '
	<td>
	<input type="submit" value="Revoke" class="submit" onclick="callit(5,\''.$row[0].'\')" >
	</td>
	<td></td>
	<td></td>
	<td></td>
</tr>
';
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
	<td><input type="submit" value="OK" class="submit" onclick="callit(2,\''.$row[0].'\')" ></td>
		<td></td>
			<td></td>
	</tr>';
}
if($op=="PLACED"){
$re=mysql_query("SELECT * FROM `employee` WHERE `Emp_Role`='D'");
	
	echo '<td>

	
	<form method="post" action="">
		<select name="sel" id="sel'.$row[0].'">


	
	';
	
	while($ro=mysql_fetch_array($re))
	{
		echo '	<option value="'.$ro[0].'">'.$ro[1].",\n".$ro['Phone'].'</option>';
	}
	echo '
	</select>
            </td>
	
	<td>  <input type="submit" value="Assign Delivery Boy" class="submit" onclick="callit(3,\''.$row[0].'\')"></td>
	<td></td>
		<td></td>
	</form>
	</tr>';
}
if($op=="YET_TO_DISPATCH"){
	echo '<td>
	<form method="post" action="">
        <input type="submit" value="IN_TRANSIT" class="submit" onclick="callit(4,\''.$row[0].'\')" ></td>
	</form>
	<td></td>
	</tr>';
}
if($op=="IN_TRANSIT"){
	echo '<td>
	<form method="post" action="">
	<td><input id="sel'.$row[0].'" type="text" name="hello" placeholder="Delivered Time">	</td>
     <td>   <input type="submit" value="Delivered" class="submit" onclick="callit(6,\''.$row[0].'\')" >
	</form>
	</td>
	<td></td>
	<td></td>
	</tr>';
}
if($op=="CANCELED"){
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
 }
?>      

</table>
	<script type="text/javascript">
		$(document).ready(function() {
			
		<?php
		for($i=0;$i<$count;$i++)
	
		echo '$("#various'.$i.'").fancybox();'

	?>
 <!-- call this wen the timer is over -->
		});
	</script>