
<?php
$ed=@$_GET['ed'];
if(isset($ed) && $ed==md5("EditEmployee")){
	?>
<form action=""  method="post" class="formbac">
<p></p>
<input name="catid" type="hidden" value="<?php $_GET['editid'] ?>">
<table>
<tr><td>Employee Name:</td><td><input type="text" name="empname"></td></tr>
<tr><td>Employee Role:</td><td>
<select id="role" name="role">
<option value="-1"></option>
<option value="E">Employee</option>
<option value="D">Delivery Boy</option>
</select></td></tr>
<tr><td>Phone Number:</td><td><input type="text" name="empphn" maxlength="10"></td></tr>
<tr><td>Password:</td><td><input type="text" name="empname"></td></tr>
<tr><td>Employee Status:</td><td>
<select id="status" name="status">
<option value="-1">--Select Role--</option>
<option value="WORKING">WORKING</option>
<option value="NOTWORKING">NOTWORKING</option>
</select>
</td></tr>
<tr><td><input type="submit" name="submitcat" style="padding:.2em .2em;width:100px" class="submitbut"  value="Update"></td> <td> <a href="index.php?page=6b7ef49830c9459829b92f616d84942e" class="submitbut" style="padding:.2em .2em;width:100px;text-align:center">Back</a></td></tr>
</table>

</form>
    <?php
	}
	else if(isset($ed) && $ed==md5("DeleteEmployee")){
	?>
    <form action=""  method="post" class="formbac">
<p></p>
<input name="catid" type="hidden" value="<?php $_GET['editid'] ?>">
<table>
<tr><td></td><td>Do you want to delete the Employee : <?php echo $_GET['empname'] ?> ?</td></tr>
<tr><td></td><td><input type="submit" name="submitdel" style="padding:.2em .2em;width:100px"  class="submitbut"  value="Confirm"><a href="index.php?page=24cef61c4102fbfb69d9d12e0228478c" class="submitbut" style="padding:.2em .2em;width:100px;text-align:center">Back</a></td></tr>
</table>
</form>
	<?php	
		}else{
		
		
		?>
    <div id="three">

   
<table istyle="width:600px;"><tr><th>Employee ID</th><th>Employee Name</th><th>Employee Role</th><th></th></tr>
<?php

$res=mysql_query("SELECT * FROM `employee`") ;
while($row=mysql_fetch_array($res)){
	echo '<tr>';
	
	echo '<td>'.$row['Emp_ID'].'</td>';
	echo '<td>'.$row['Emp_Name'].'</td>';
	echo '<td>'.$row['Emp_Role'].'</td>';
	echo '	<td align="right" class="editlinks">
	<a href="index.php?page='.md5('viewemployees').'&edit=true&ed='.md5("EditEmployee").'&editid='.$row['Emp_ID'].'" class="edit"></a>
	<a href="index.php?page='.md5('viewemployees').'&delete=true&ed='.md5("DeleteEmployee").'&editid='.$row['Emp_ID'].'&empname='.$row['Emp_ID'].'" class="delete"></a></td>';
	echo '</tr>';
	}
		}
?>
</table>
</div>