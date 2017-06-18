<!-- Author: Manoj Sureddi
Facebook: https://www.facebook.com/manoj.sureddi
Email: manoj.wolverine8@gmail.com
Description:This page is for the development of admin panel for getmefood.in
-->

<?php
include "config.inc.php";
?>

    <form method="post" action="index.php?page=5f640544fc4b39fde8d20e67380f8c9f" style="">
                    									<input style="float:left" name="workfromdate" id="datepicker2" type="text" onchange="fireStateChanged()" value="<?php echo isset($_POST['workfromdate']) ?  $_POST['workfromdate']: '' ?>" />
									<div id="datepicker2"></div>
                                    
                    									<input style="float:left; margin-left:30px;" name="worktodate" id="datepicker" type="text" onchange="fireStateChanged()" value="<?php   echo isset($_POST['worktodate']) ?  $_POST['worktodate']: ''?>" />
									<div id="datepicker"></div>
                                    <input type="submit" name="submit" class="submit" style="margin-left:30px;padding:.2em; margin-top:0">
          </form>
     
 
 <div id="three">       

<div id="table">
  <table border="0" cellspacing="5" cellpadding="10">
        <tr>
        <th align="center">Order Id</th>
        <th align="center">Time Of Delivery</th>
 
        <th align="center">Restaurant Name</th>
        <th align="center">Custumer Name</th>
<th align="center" >Cost</th>
        <th align="center" >Delivery Boy</th>
        <th align="center" >Order Received time</th>
</tr>
<?php

if(isset($_POST['submit'])){
		$from=mysql_real_escape_string($_POST['workfromdate']);
	$to=mysql_real_escape_string($_POST['worktodate']);

$sql=mysql_query("SELECT * FROM `orders` WHERE `Order_Time` between '".$from."' and '".$to."'");
while($row=mysql_fetch_array($sql))
{
echo "
<tr>
<td>".$row['Order_Id']."</td>
<td>".$row['delvery_time']."</td>
<td>".$row['Restaurant_Name']."</td>";
	$res1=mysql_query("SELECT * FROM `user_information` WHERE `user_id`='".$row['Customer_Id']."'");
	 $row1=mysql_fetch_array($res1);
	 echo "
<td>".$row1['name']."</td>
";
	$res1=mysql_query("SELECT * FROM `order_contents` WHERE `Order_Id`='".$row['Order_Id']."'");
	 $row1=mysql_fetch_array($res1);
echo "
<td>".$row1 ['Total_Item_Cost']."</td>
";
$re=mysql_query("SELECT * FROM `employee` WHERE `Emp_ID`='".$row['Assigned_Delivery_Boy']."'");
$row1=mysql_fetch_array($res1);
echo"
<td>".$row1['Emp_Name']."</td>
<td>".$row['Order_Time']."</td>
</tr>

";
}
}
?>
</table>
</div>
<div id="hai"></div>

         	<script>
$(function(){
  $.datepicker.setDefaults(
    $.extend($.datepicker.regional[""])
  );
  $("#datepicker").datepicker();
   $("#datepicker2").datepicker();
      $("#datepicker3").datepicker();
	     $("#datepicker4").datepicker();
		       $("#datepicker5").datepicker();
	     $("#datepicker6").datepicker();
});


$("#export").click(function(e) {
    $.ajax({
url:"excelexport.php",
async:true,
type:"POST",
data:"a="+ $("#datepicker2").val()+"&b="+ $("#datepicker").val(),
success: function(data)
{
document.getElementById("hai").innerHTML='';

}	
	});
});
	</script>
    
</div>
</body>
</html>


