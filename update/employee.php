
<?php


	  if(isset($_SESSION['status'])){
	  $a=$_SESSION['status'];
	  if($a)
	  {
	   echo '<span class="alert alert-success" > Registration Succesfull</span>';
	  }
	  else
	  {
	   echo '<span class="alert alert-danger" >Regitration Unsuccesfull</span>';
	  }
	  unset($_SESSION['status']);
	  }
?>
<h4>Employee Joining</h4>
<form action="employeedao.php" method="post">
<table>
<tr><td>Name:</td><td><input type="text" name="empname"></td></tr>
<tr><td>Role of the Employee:</td><td><select name="emprole">
<option value="Employee">Employee</option>
<option value="Delivery Boy">Delivery boy</option>
</select></td></tr>
<tr><td>Phone:</td><td><input type="text" name="phone" maxlength="10"></td></tr>
<tr><td>Password:</td><td><input type="password" name="passwd">
</td></tr>
<tr><td>Status:</td><td><select name="status">
<option value="Working">Working</option>
<option value="Not Working">Not Working</option>
</select></td></tr>
<tr><td>Area Code:</td><td><input type="text" name="empareacode"></td></tr>

<tr><td></td><td></td></tr>
</table>
<input type="submit" name="submit" >
</form>

</body>
</html>
