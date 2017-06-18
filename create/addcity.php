<?php
$ed=@$_GET['ed'];
if(isset($ed) && $ed==md5("EditArea")){
	?>

<form action="citydao.php?opt=1"  method="post" class="formbac">
  <p></p>
  <input name="catid" type="hidden" value="<?php echo  $_GET['editid'] ?>">
  <table>
    <tr>
      <td>New Name</td>
      <td><input type="text" name="newname" id="newname"></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" name="submitcat" style="padding:.2em .2em;width:100px" class="submitbut"  value="Update">
        <a href="index.php?page=60e186e89bb5ba2d36780972616d3440" class="submitbut" style="padding:.2em .2em;width:100px;text-align:center">Back</a></td>
    </tr>
  </table>
</form>
<?php
	}
	else if(isset($ed) && $ed==md5("DeleteArea")){
		
	?>
<form action="citydao.php?opt=2"  method="post" class="formbac">
  <p></p>
  <input name="catid" type="hidden" value="<?php echo $_GET['editid'] ?>">
  <table>
    <tr>
      <td></td>
      <td>Do you want to delete the category : <?php echo $_GET['catname'] ?> ?</td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" name="submitdel" style="padding:.2em .2em;width:100px"  class="submitbut"  value="Confirm">
        <a href="index.php?page=60e186e89bb5ba2d36780972616d3440" class="submitbut" style="padding:.2em .2em;width:100px;text-align:center">Back</a></td>
    </tr>
  </table>
</form>
<?php	
		}
	else{
?>
<form action="citydao.php" method="post" class="formbac">
  <?php


	  if(isset($_SESSION['status'])){
	  $a=$_SESSION['status'];
	  if($a)
	  {
	   echo '<span class="alert alert-success" > Succesfully </span>';
	  }
	  else
	  {
	   echo '<span class="alert alert-danger" >Unsuccesfull</span>';
	  }
	  unset($_SESSION['status']);
	  }
?>
  <h4>City Entry</h4>
  <table>
    <tr>
      <td>City Name:</td>
      <td><input type="text" name="cityname"></td>
    </tr>  
    <tr>
      <td></td>
      <td><input type="submit" name="submit"  class="submitbut"  value="Add City"></td>
    </tr>
  </table>
</form>
<?php
	}
?>
<div id="three">
  <table style="width:400px;">
    <tr>
      <th>City Name</th>
      <th></th>
    </tr>
    <?php
$res=mysql_query("SELECT * FROM `cities`");

while($row=mysql_fetch_array($res)){
	echo'
	<tr>
	<td>'.$row['city'].'</td>
	<td align="right" class="editlinks">
	<a href="index.php?page=60e186e89bb5ba2d36780972616d3440&edit=true&ed='.md5("EditArea").'&editid='.$row['id'].'" class="edit"></a>
	<a href="index.php?page=60e186e89bb5ba2d36780972616d3440&delete=true&ed='.md5("DeleteArea").'&editid='.$row['id'].'&catname='.$row['city'].'" class="delete"></a></td>
	</tr>
	
	';
}
?>
  </table>
</div>
