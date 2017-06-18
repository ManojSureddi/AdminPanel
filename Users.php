<input type="text" name="searchtype" id="query">
<input id="search" type="button" value="search" class="submitbut" style="padding:.2em .2em;width:100px">
<script type="text/javascript">
$("#search").click(function(e) {
    window.location="index.php?page=d1f5fdd23826eec75fd5791c1ec40dea&search="+$("#query").val();
});
</script>



<div id="three">
<?php
$search=@$_GET['search'];
if(isset($search)){
	
	
	?>
    <table width="700px">
<tr><th>S.No</th><th>Name</th><th>Phone</th><th>Email</th><th></th></tr>
    <?php
	$rec=1;
	$sql_d = "SELECT * FROM users where User_Id='".$search."' or Name='".$search."' or Contact='".$search."' or email='".$search."'"; 
	$res_result = mysql_query ($sql_d);
	while ($row = mysql_fetch_assoc($res_result)) {
?>
            <tr>
                      <td  align="center"><?php echo $rec++ ?></td>  
            <td><?php echo $row['Name']; ?></td>
            <td align="center"><?php echo $row['Contact']; ?></td>  
              <td><?php echo $row['Email']; ?></td> 
               
                <?php echo '
					<td align="right" class="editlinks">
	<a href="index.php?page=d1f5fdd23826eec75fd5791c1ec40dea&edit=true&ed='.md5("ManageUsers").'&editid='.$row['User_Id'].'" class="edit"></a>
	<a href="index.php?page=d1f5fdd23826eec75fd5791c1ec40dea&delete=true&ed='.md5("deleteUsers").'&editid='.$row['User_Id'].'&catname='.$row['Name'].'" class="delete"></a></td>
				';?>
               
            </tr>
<?php
		}
	
	}else{
?>




<?php 
$num_rec_per_page=10;
if (isset($_GET["pg"])) { $page  = $_GET["pg"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 
$sql = "SELECT * FROM users LIMIT $start_from, $num_rec_per_page"; 
$rs_result = mysql_query ($sql); //run the query
?> 
<table width="700px">
<tr><th>S.No</th><th>Name</th><th>Phone</th><th>Email</th><th></th></tr>
<?php 
$rec=1;
while ($row = mysql_fetch_assoc($rs_result)) { 
?> 
            <tr>
                      <td  align="center"><?php echo $rec++ ?></td>  
            <td><?php echo $row['Name']; ?></td>
            <td align="center"><?php echo $row['Contact']; ?></td>  
              <td><?php echo $row['Email']; ?></td> 
               
                <?php echo '
					<td align="right" class="editlinks">
	<a href="index.php?page=d1f5fdd23826eec75fd5791c1ec40dea&edit=true&ed='.md5("ManageUsers").'&editid='.$row['User_Id'].'" class="edit"></a>
	<a href="index.php?page=d1f5fdd23826eec75fd5791c1ec40dea&delete=true&ed='.md5("deleteUsers").'&editid='.$row['User_Id'].'&catname='.$row['Name'].'" class="delete"></a></td>
				';?>
               
            </tr>
<?php 
}; 
?> 
</table>
<p id="pagi" align="center">
<?php 
$sql = "SELECT * FROM users"; 
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 

echo "<a href='index.php?page=d1f5fdd23826eec75fd5791c1ec40dea&pg=1'>".'|<'."</a> "; // Goto 1st page  

for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='index.php?page=d1f5fdd23826eec75fd5791c1ec40dea&pg=".$i."'>".$i."</a> "; 
}; 
echo "<a href='index.php?page=d1f5fdd23826eec75fd5791c1ec40dea&pg=$total_pages'>".'>|'."</a> "; // Goto last page

?>
</p>


<?php
	}
?>
</div>