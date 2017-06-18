


<form action="restaurantdao.php" method="post" class="formbac">
<?php

	  if(isset($_SESSION['status'])){
	  $a=$_SESSION['status'];
	  if($a)
	  {
	   echo '<span class="alert alert-success" > Registration Succesfull</span>';
	  }
	  else
	  {
	   echo '<span class="alert alert-danger" >Registration Unsuccesfull</span>';
	  }
	  unset($_SESSION['status']);
	  }
?>
<h4>Restaurant Registration</h4>
<table>
<tr><td>Name:</td><td><input type="text" name="restname" required></td></tr>
<tr><td>Area</td><td><select name="areacode">
<option value="-1">Select Area</option>
<?php
$res=mysql_query("SELECT * FROM `areas`") ;
while($row=mysql_fetch_array($res)){
	echo '<option value="'.$row['Area_Code'].'">'.$row['Area_Name']."(".$row['City_Name'].")".'</option>';
	}

?>
</select></td></tr>
<tr><td>Contact Person Name:</td><td><input type="text" name="contactname" required></td></tr>
<tr><td>Phone1:</td><td><input type="text" name="phone1" maxlength="10" required></td></tr>
<tr><td>Phone2:</td><td><input type="text" name="phone2" maxlength="10"  required></td></tr>
<tr><td>Address:</td><td><textarea name="address" rows="5" cols="10" required></textarea></td></tr>
<tr><td>Status</td><td><select name="status">
<option value="SERVED">Served</option>
<option value="UNSERVED">Unserved</option>
</select></td></tr>
<tr><td>Reason:</td><td><input type="text" name="reason"  required></td></tr>
<tr><td  align="center">Time Slot_1 Start:<br/>	<div class="clearfix">
			<div class="input-group clockpicker pull-center" data-placement="top" data-align="top" data-autoclose="true">
				<input type="text" class="form-control" value="00:00" name="tstart1" readonly>
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-time"></span>
				</span>
			</div>
		</div></td>
<td align="center">Time Slot_1 end:<br/>
	<div class="clearfix">
			<div class="input-group clockpicker pull-center" data-placement="top" data-align="top" data-autoclose="true">
				<input type="text" class="form-control" value="00:00" name="tend1" readonly>
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-time"></span>
				</span>
			</div>
		</div>
</td></tr>
<tr><td  align="center">Time Slot_2 Start:<br/>
	<div class="clearfix">
			<div class="input-group clockpicker pull-center" data-placement="top" data-align="top" data-autoclose="true">
				<input type="text" class="form-control" value="00:00" name="tstart2" readonly>
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-time"></span>
				</span>
			</div>
		</div>
</td><td  align="center">Time Slot_2 end:<br/>
<div class="clearfix">
			<div class="input-group clockpicker pull-center" data-placement="top" data-align="top" data-autoclose="true">
				<input type="text" class="form-control" value="00:00" name="tend2" readonly>
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-time"></span>
				</span>
			</div>
		</div>
</td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="submit" class="submitbut"  value="Register Restaurant"/>
</td></tr>
</table>
</form>

</body>
</html>