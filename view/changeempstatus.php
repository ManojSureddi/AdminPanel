
<?php


	  if(isset($_SESSION['status'])){
	  $a=$_SESSION['status'];
	  if($a)
	  {
	   echo '<span class="alert alert-success" > Status Changed</span>';
	  }
	  else
	  {
	   echo '<span class="alert alert-danger" > Status Change Unsuccesfull</span>';
	  }
	  unset($_SESSION['status']);
	  }
?>
<h4>Employee Status Change</h4>
<form action="employeedao.php" method="post">
<table>
<tr><td>Status:</td><td><select name="status">
<option value="Working">Working</option>
<option value="Not Working">Not Working</option>
</select></td></tr>

<tr><td></td><td><input type="submit" name="submit" value="Update Status" class="submitbut" ></td></tr>
</table>

</form>

<?php
$res=mysqli_query($con,"SELECT * FROM `employee` ");
while($row=mysqli_fetch_array($res)){
	echo '<option value="'.$row['Emp_ID'].'">'.$row['Emp_Name']."  id:".$row['Emp_ID'].'</option>';
	}
?>

</body>
</html>