<!-- Author: Manoj Sureddi
Facebook: https://www.facebook.com/manoj.sureddi
Email: manoj.wolverine8@gmail.com
Description:This page is for the development of admin panel for getmefood.in
-->

<?php
session_start();
if(!isset($_SESSION['exec']))
{
	header("Location:execlogin.php");
}
?>

<!DOCTYPE html>
<html>
<?php

include "common/header.php";
$_SESSION['referer']=$_SERVER['PHP_SELF'];
?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <title></title>
     
		<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
           <script src="js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
             <link type="text/css" href="js/jquery-ui-1.9.1.custom.min.css" rel="stylesheet" />
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>

<style>
body
{
	background:#FFF;
}
 #three th
{
	background:#00a478 !important;
	color:#FFF;
	padding:10px 10px 10px 10px;
	
}
 #three table
{
	margin:auto;
	margin-top:60px;
	border:1px solid #00a478;

}
 #three td
{
		padding:10px 10px 10px 10px;
}
#three tbody > tr:nth-child(odd) > td {
  background-color: #f9f9f9;
  padding:10px 10px 10px 10px;
}
#three tbody > tr:nth-child(even) > td{
  background-color: #CCCCCC;
  padding:10px 10px 10px 10px;
}
</style>
    </head>
    <body>
     <h1>Order Page</h1>
<!--  <select id="select"  name="category" onChange="changedStatus(this.value,this.selected)">
  <option value="INPROCESS">INPROCESS</option>
  <option value="CONFIRMED">CONFIRMED</option>
  <option value="PLACED">PLACED</option>
  <option value="ASSIGNED">ASSIGNED</option>
  <option value="DELIVERED">DELIVERED</option>
    <option value="CANCELED">CANCELLED</option>
      <option value="All">ALL</option>
    </select>-->
    <?php
	$res=mysql_query("SELECT * FROM `employee` WHERE `Emp_ID`='".$_SESSION['exec']."'");
	$rowu=mysql_fetch_array($res);
	?>
    <h3>Hi! <?php echo $rowu['Emp_Name'] ?>
<a href="logexecout.php" class="submit" style="margin-left:60px; font-size:14px">Log out</a></h3>
    <form method="post" action="orderdb.php">
    <input  id="c1" type="checkbox" name="optionz[]" value="INPROCESS" onchange="fireStateChanged()" > INPROCESS
     <input id="c3" type="checkbox" name="optionz[]" value="CONFIRMED" onchange="fireStateChanged()">CONFIRMED
                   <input id="c5" type="checkbox" name="optionz[]" value="PLACED" onchange="fireStateChanged()">PLACED
          <input id="c8" type="checkbox" name="optionz[]" value="All" onchange="fireStateChanged()">All
                    									<input name="workfromdate" id="datepicker" type="text" onchange="fireStateChanged()" />
									<div id="datepicker"></div>
          </form>

          <br/>

   <script>
   
   </script>
         <br/>  
 <div id="three">       

<div id="table">
  <table border="0" cellspacing="5" cellpadding="10">
        <tr>
        <th align="center">Order Id</th>
        <th align="center">Time Of Order</th>
        <th align="center">Order Status</th>
        <th align="center">Area</th>
        <th align="center">Restaurant Id</th>
        <th align="center">Restaurant Name</th>

        <th align="center">Custumer Id</th>
        <th align="center">Custumer Name</th>
<th align="center" >Assigned Executive</th>
        <th align="center" >Assigned Delivery Boy</th>
        <th align="center" ></th>
        <th align="center" ></th>

</tr>
</table>
</div>
<div id="hai"></div>
<script>
$(document).ready(function(e) {
    $('#c1').prop("checked",true);
	var obj=new Date();
	
$("#datepicker").val("0"+(obj.getMonth()+1)+"/"+obj.getDate()+"/"+ obj.getFullYear());
	fireStateChanged();
});
</script>
<script>
function callit(str1,str2){
	var datastring="";
	if(str1==1)
	{
		$('#sel'+str2).val();
		datastring="pq="+str1+"&r="+str2+"&sel="+$('#seli'+str2).val();;
	}
	else 	if(str1==0)
	{
		$('#sel'+str2).val();
		datastring="pq="+str1+"&r="+str2+"&sel="+$('#sel'+str2).val();;
	}
	else 	if(str1==2)
	{
		$('#sel'+str2).val();
		
		datastring="pq="+str1+"&r="+str2+"&sel="+$('#sel'+str2).val()+"&cos="+$('#cos'+str2).val();
	}
		else if(str1==3)
	{
		$('#sel'+str2).val();
		datastring="pq="+str1+"&r="+str2+"&sel="+$('#sel'+str2).val();
	}
		else if(str1==4)
	{
		datastring="pq="+str1+"&r="+str2;
	}
			else if(str1==5)
	{
		datastring="pq="+str1;
	}
			else if(str1==6)
	{
		datastring="pq="+str1+"&r="+str2+"&sel="+$('#sel'+str2).val();
	}	
		document.getElementById("hai").innerHTML='<img src="500.GIF" />';
$.ajax({
url:"update.php",
async:true,
type:"POST",
data:datastring,
success: function(data)
{
document.getElementById("hai").innerHTML='';
	fireStateChanged();
}	
	});
}

</script>      

	<script>

function fireStateChanged()
{
var le=$('input[name="optionz[]"]:checked').length;
var comma="";
var opt=""
$('input[name="optionz[]"]:checked').each(function() {
 opt = opt + comma+ $(this).val();
 comma=",";
});
var lt=$('input[name="workfromdate"]').val();
var datastring="";
if(lt.indexOf("/")!=-1)
{
	datastring="optionz="+opt+"&workfromdate="+lt;
}
else
{
	datastring="optionz="+opt;
}
$.ajax({
		url:"orderdbexec.php",
		async:true,
		type:"POST",
		data:datastring,
		success: function(data)
		{
			document.getElementById("table").innerHTML=data;
		}
		})
}
    </script>
	<script type="text/javascript">
		$(document).ready(function() {
			
		<?php
		for($i=0;$i<$count;$i++)
	
		echo '$("#various'.$i.'").fancybox();'

	?>
 <!-- call this wen the timer is over -->
		});
		
		$('#c8').click(function(e) {
    $('#c1').prop("checked",false);

	$('#c3').prop("checked",false);

	$('#c5').prop("checked",false);

fireStateChanged();
});
	</script>

<!--<script src="../js/jquery-1.9.1.js" type="text/javascript"></script>-->

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
	</script>
    
</div>
</body>
</html>


