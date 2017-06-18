
<form action="employeedao.php" method="post" class="formbac">
<!--<span id="msg" class="alert alert-success" ></span>-->
<?php
	  if(isset($_SESSION['status'])){
	  $a=$_SESSION['status'];
	  if($a)
	  {
	   echo '<span class="alert alert-success" > Succesfully Added</span>';
	  }
	  else
	  {
	   echo '<span class="alert alert-danger" >Unsuccesfull entry</span>';
	  }
	  unset($_SESSION['status']);
	  }
?>
<p align="center" id="msg" style="display:none"></p>
<h4>Employee entry</h4>
<table>
<tr><td>Employee Name:</td><td><input type="text" name="empname" id="empname"></td></tr>
<tr><td>Employee Role:</td><td>
<select id="role" name="role">
<option value="-1">--Select Role--</option>
<option value="E">Employee</option>
<option value="D">Delivery Boy</option>
</select></td></tr>
<tr><td>Phone Number:</td><td><input type="text" name="empphn" maxlength="10" id="phn"></td></tr>
<tr><td>Password:</td><td><input type="text" name="emppass" id="emppass"></td></tr>
<tr><td>Employee Status:</td><td>
<select id="status" name="status">
<option value="-1">--Select Status--</option>
<option value="WORKING">WORKING</option>
<option value="NOTWORKING">NOTWORKING</option>
</select>
</td></tr>
<tr><td>Area</td><td><select name="areacode" id="areacode">
<option value="-1">Select Area</option>
<?php
$res=mysql_query("SELECT * FROM `areas`") ;
while($row=mysql_fetch_array($res)){
	echo '<option value="'.$row['Area_Code'].'">'.$row['Area_Name']."(".$row['City_Name'].")".'</option>';
	}

?>
</select></td></tr>
<tr><td></td><td><input type="submit" name="submit"  class="submitbut"  value="Add Employee" ></td></tr>
</table>
</form>

<script>
$(".formbac").submit(function(e) {
	$("#msg").css("display","block");
    var empname=$("#empname").val();
	var emprole=$("#role").val();
	var phone = $("#phn").val();
	var emppass=$("#emppass").val();
	var areacode=$("#areacode").val();
	var status=$("#status").val();
	if(empname=="" && !empname.match(/^[A-Za-z_]+$/)){
		$("#msg").html("Enter employee name");
		return false;
		}
	if(emprole=="-1"){
		$("#msg").html("Select employee role");
		return false;	
		}
		if(phone==""||isNaN(phone)|| phone.length!=10){
		$("#msg").html("Enter phone number");
		return false;	
			}
		if(emppass==""){
						$("#msg").html("Enter the password");
		return false;	
			}
			if(areacode=="-1"){
							$("#msg").html("Select area");
		return false;	
				}
				if(status=="-1"){
								$("#msg").html("Select employee status");
		return false;	
					}
					
	return true;
});
</script>

