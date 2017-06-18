<!-- Author: Manoj Sureddi
Facebook: https://www.facebook.com/manoj.sureddi
Email: manoj.wolverine8@gmail.com
Description:This page is for the development of admin panel for getmefood.in
-->



<!DOCTYPE html>
<html>
<?php
include "config.inc.php";
$_SESSION['referer']=$_SERVER['PHP_SELF'];
?>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
 <link type="text/css" href="js/jquery-ui-1.9.1.custom.min.css" rel="stylesheet" />
<!--<script src="../js/jquery-1.9.1.js" type="text/javascript"></script>-->
<script src="js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
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
    <form method="post" action="orderdb.php">
    <input  id="c1" type="checkbox" name="optionz[]" value="INPROCESS" onchange="fireStateChanged()" > INPROCESS
       <input id="c2" type="checkbox" name="optionz[]" value="ASSIGNED" onchange="fireStateChanged()">ASSIGNED EXECUTIVE
     <input id="c3" type="checkbox" name="optionz[]" value="CONFIRMED" onchange="fireStateChanged()">CONFIRMED
                   <input id="c5" type="checkbox" name="optionz[]" value="PLACED" onchange="fireStateChanged()">PLACED
      <input id="c4" type="checkbox" name="optionz[]" value="YET_TO_DISPATCH" onchange="fireStateChanged()">YET TO DISPATCH
          <input id="c5" type="checkbox" name="optionz[]" value="IN_TRANSIT" onchange="fireStateChanged()">IN TRANSIT
    <input id="c6" type="checkbox" name="optionz[]" value="DELIVERED" onchange="fireStateChanged()">DELIVERED
         <input id="c7" type="checkbox" name="optionz[]" value="CANCELED" onchange="fireStateChanged()">CANCELED
                  <input id="c8" type="checkbox" name="optionz[]" value="All" onchange="fireStateChanged()">All
                    									<input name="workfromdate" id="datepicker" type="text" onchange="fireStateChanged()" />
									<div id="datepicker"></div>
          </form>
<a href="allorders.php" class="submit">All Orders</a>
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
	fireStateChanged();
});
$('#c8').click(function(e) {
    $('#c1').prop("checked",true);
	$('#c2').prop("checked",true);
	$('#c3').prop("checked",true);
	$('#c4').prop("checked",true);
	$('#c5').prop("checked",true);

$('#c6').prop("checked",true);
$('#c7').prop("checked",true);
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
		datastring="pq="+str1+"&r="+str2;
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
		url:"orderdb.php",
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


