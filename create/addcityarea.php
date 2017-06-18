<?php
$ed=@$_GET['ed'];
if(isset($ed) && $ed==md5("EditArea")){
	?>

<form action="addareadao.php?opt=1"  method="post" class="formbac">
  <p></p>
  <input name="catid" type="hidden" value="<?php  echo $_GET['editid'] ?>">
  <table>
    <tr>
      <td>Status:</td>
      <td><select name="status">
          <option value="SERVED">SERVED</option>
          <option value="UNSERVED">UNSERVED</option>
        </select></td>
    </tr>
    <tr>
      <td>Reason:</td>
      <td><input type="text" name="reason"></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" name="submitcat" style="padding:.2em .2em;width:100px" class="submitbut"  value="Update">
        <a href="index.php?page=6b7ef49830c9459829b92f616d84942e" class="submitbut" style="padding:.2em .2em;width:100px;text-align:center">Back</a></td>
    </tr>
  </table>
</form>
<?php
	}
	
	else{
?>
<form action="categorydao.php" method="post" class="formbac">
  <?php
 include('config.inc.php');

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
  <h4>City Entry</h4>
  <table>
    <tr>
      <td>Area Name:</td>
      <td><input type="text" name="areaname"></td>
    </tr>
    <tr>
      <td>City Name:</td>
      <td><select name="cityname">
          <option value="-1">Select City</option>
          <?php
$res=mysql_query("SELECT * FROM `cities`");

while($row=mysql_fetch_array($res)){
	echo '
	
	  <option value="'.$row['city'].'">'.$row['city'].'</option>
	';
	
	}
	  
	  ?>
        </select></td>
    </tr>
    <tr>
      <td>Dexcription:</td>
      <td><textarea rows="5" cols="5" name="desc"></textarea></td>
    </tr>
    <tr>
      <td>Status:</td>
      <td><select name="status">
          <option value="SERVED">SERVED</option>
          <option value="UNSERVED">UNSERVED</option>
        </select></td>
    </tr>
    <tr>
      <td>Reason:</td>
      <td><input type="text" name="reason"></td>
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
  <table style="width:700px;">
    <tr>
      <th>Area Name</th>
      <th>City Name</th>
      <th>Description</th>
      <th>Status</th>
      <th>Reason</th>
      <th></th>
    </tr>
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
	<a href="index.php?page=6b7ef49830c9459829b92f616d84942e&edit=true&ed='.md5("EditArea").'&editid='.$row['Area_Code'].'" class="edit"></a>
	</td>
	</tr>
	
	';
}
?>
  </table>
</div>
