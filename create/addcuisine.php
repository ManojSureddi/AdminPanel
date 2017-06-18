<?php
$ed=@$_GET['ed'];
if(isset($ed) && $ed==md5("EditArea")){
	?>
<form action=""  method="post" class="formbac">
<p></p>
<input name="catid" type="hidden" value="<?php $_GET['editid'] ?>">
<table>
<tr><td>New Name</td><td>
<input type="text" name="newname" id="newname"></td></tr>
<tr><td></td><td><input type="submit" name="submitcat" style="padding:.2em .2em;width:100px" class="submitbut"  value="Update"> <a href="index.php?page=6b7ef49830c9459829b92f616d84942e" class="submitbut" style="padding:.2em .2em;width:100px;text-align:center">Back</a></td></tr>
</table>
</form>
    <?php
	}
	else if(isset($ed) && $ed==md5("DeleteArea")){
	?>
    <form action=""  method="post" class="formbac">
<p></p>
<input name="catid" type="hidden" value="<?php $_GET['editid'] ?>">
<table>
<tr><td></td><td>Do you want to delete the cuisine : <?php echo $_GET['catname'] ?> ?</td></tr>
<tr><td></td><td><input type="submit" name="submitdel" style="padding:.2em .2em;width:100px"  class="submitbut"  value="Confirm"><a href="index.php?page=6b7ef49830c9459829b92f616d84942e" class="submitbut" style="padding:.2em .2em;width:100px;text-align:center">Back</a></td></tr>
</table>
</form>
	<?php	
		}
	else{
?>
<form action="categorydao.php" method="post" class="formbac">
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
<h4>Cuisine entry</h4>
<table>
<tr><td>Cuisine Name:</td><td><input type="text" name="catname"></td></tr>
<tr><td></td><td><input type="submit" name="submit"  class="submitbut"  value="Add City"></td></tr>
</table>

</form>


<?php
	}
?>



<div id="three">
<table style="width:600px;">
<tr><th>Area Name</th><th>City Name</th><th>Description</th><th>Status</th><th>Reason</th><th></th></tr>
<?php
$res=mysql_query("SELECT * FROM `areas`");

while($row=mysql_fetch_array($res)){
	echo'
	<tr>
	<td>'.$row['Area_Name'].'</td>
	<td>'.$row['City_Name'].'</td>
	<td>'.$row['Description'].'</td>
	<td>'.$row['Status'].'</td>
		<td>'.$row['Reason'].'</td>
	<td align="right" class="editlinks">
	<a href="index.php?page=6b7ef49830c9459829b92f616d84942e&edit=true&ed='.md5("EditArea").'&editid='.$row['Area_Code'].'">[&nbsp;Edit&nbsp;]</a>
	<a href="index.php?page=6b7ef49830c9459829b92f616d84942e&delete=true&ed='.md5("DeleteArea").'&editid='.$row['Area_Code'].'&catname='.$row['Area_Name'].'">[&nbsp;Delete&nbsp;]</a></td>
	</tr>
	
	';
}
?>

</table>

</div>
