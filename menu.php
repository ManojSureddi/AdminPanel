

<form action="menudao.php" method="post" class="formbac">
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
<h4>Menu Item Entry</h4>
<table>
<tr><td>Restaurant Name:</td><td><select name="restid">
<?php

$res=mysql_query("SELECT * FROM `restaurants`") ;
while($row=mysql_fetch_array($res)){
	echo '<option value="'.$row['Restaurant_Id'].'">'.$row['Name'].'</option>';
	}

?>

</select></td></tr>
<tr><td>Item Type:</td><td><select name="itemtype">
<option value="-1">Select Category</option>
<?php
$res=mysql_query("SELECT * FROM `item_type`");
while($row=mysql_fetch_array($res)){
	echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
	}

?>
</select></td></tr>

<tr><td>Item Name:</td><td><input type="text" name="itemname">
</td></tr>
<tr><td>Item Price:</td><td><input type="text" name="itemprice"></td></tr>
<tr><td>Description:</td><td><textarea name="description"></textarea></td></tr>
<tr><td>Status:</td><td><select name="status">
<option value="SERVED">SERVED</option>
<option value="UNSERVED">UNSERVED</option>
</select></td></tr>
<tr><td></td><td><input type="submit" name="submit"  class="submitbut"  value="Add Item"></td></tr>
</table>

</form>
<?php
unset($_SESSION['status']);
?>

</body>
</html>