<div id="rightbox">
<div class="container">

<h4></h4>

<table id="right"><tr><th>Restaurant Id</th><th>Restaurant Name</th></tr>
<?php

$res=mysql_query("SELECT * FROM `restaurants`") ;
while($row=mysql_fetch_array($res)){
	echo '<tr>';
	
	echo '<td>'.$row['Restaurant_Id'].'</td>';
	echo '<td>'.$row['Name'].'</td>';

	echo '</tr>';
	}

?>
</table>


</div>
</div>
</section>
</body>
</html>