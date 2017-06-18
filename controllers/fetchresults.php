<!-- Author: Manoj Sureddi
Facebook: https://www.facebook.com/manoj.sureddi
Email: manoj.wolverine8@gmail.com
Description:This page is for the development of admin panel for getmefood.in
-->

<script src="js/jquery.min.js" type="text/javascript"></script>
<link href="style.css" rel="stylesheet" type="text/css">
<style>
body
{
	background:#FFF;
}
a
{
	font-size:10px;
}
 #four th
{
	background:#00a478 !important;
	color:#FFF;
	padding:10px 10px 10px 10px;
	
}
 #four table
{
	margin:auto;
	margin-top:60px;
	border:1px solid #00a478;

}
 #four td
{
		padding:10px 10px 10px 10px;
}
#four tbody > tr:nth-child(odd) > td {
  background-color: #f9f9f9;
  padding:10px 10px 10px 10px;
}
#four tbody > tr:nth-child(even) > td{
  background-color: #CCCCCC;
  padding:10px 10px 10px 10px;
}
</style>
 <div id="three">       

<div id="table">
<div style="width:500px">

<?php
session_start();
$q=$_GET['q'];
include "config.inc.php";
$res=mysql_query("SELECT * FROM `order_contents` WHERE `Order_Id`='".$q."'");

?>
<p><b>Order Id: </b><?php echo $q ?> </p>
<p><a href="<?php echo $_SESSION['referer'] ?>" class="submit">Back to Orders page</a>
</p>
<br />
<p><a href="#" id="ed" class="submit">Edit</a></p>
<br />
<p><a href="#" id="ai" class="submit">Add Item</a></p>
<table id="acc" width="470px" cellspacing="2" cellpadding="3">
<tr>
<th align="center">Item Details</th>
<th align="center">Price</th>
<th align="center">Quantity</th>
<th align="center">Actions</th>
</tr>
<div id="additem" style="display:none">
<form action="updateitem.php?q=<?php echo $q ?>" method="post" >
<input type="text" name="itemnamez" id="namez" onkeyup="calling(this.value)"/>
<select id="hai" name="itemslist">
<option value="-1">select Item</option>
</select>
<select name="qtyz">
<?php
for($i=1;$i<12;$i++)
echo '<option value="'.$i.'">'.$i.'</option>';
?>
</select>
<input type="submit" name="submit" value="Add Item"  class="submit"/>

</form>

</div>

<form method="post" action="updateor.php?q=<?php echo $q ?>">
<?php
$r=0;
while($row=mysql_fetch_array($res))
{
echo "<tr>";
echo "<td align='left'>".$row['Item_Name']."</td>";
echo "<td align='center'>".$row['Iteam_Cost']."</td>";
echo "<td align='center'>".$row['Item_Quantity']."</td>";
$temp=$row['Item_Quantity'];

echo"<td> <select name='qty[]'>";
for($j=0;$j<12;$j++)
{
	
	if($temp== $j){
		
       echo'<option value="\''.$j.'\'" selected="selected" >'.$j.'</option>';
	}
	else
	{
		echo'<option value="\''.$j.'\'">'.$j.'</option>';
	}
}
echo "</select></td>";	
echo "</tr>";
$r+=$row['Iteam_Cost'];
}
echo "<tr><td colspan='2' align='right' ><b>Total:</b></td><td>";
echo $r;
echo "</td></tr>";


?>
</table>

<input id="sa" type="submit" value="save" class="submit" />
</form>

<div id="haiz"></div>
</div>
</div></div>
<script>
$(document).ready(function(e) {
    $("#acc td:nth-child(4)").hide();
	$("#sa").hide("slow");
});
$("#ed").click(function(e) {
    $("#acc td:nth-child(4)").show();
	$("#sa").show("slow");
});
$("#ai").click(function(e) {
    $("#additem").css("display","block");
});

function calling(str)
{
	    $.ajax({
		url:"fetchmenu.php",
		async:true,
		data:"str="+str+"&q="+<?php echo '"'.$q.'"' ?>,
		type:"POST",
		success: function(data)
		{
			document.getElementById("hai").innerHTML=data;
			
		}
		});
}
    

</script>
