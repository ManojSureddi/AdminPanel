<?php
/*if($con = mysql_connect("localhost","sourcenx_gmfuser","getmefood!123")){
	mysql_select_db("sourcenx_gmf") || die("unable to connect to database");
	}
else{
	die("unable to connect");
	}*/
if($con = mysql_connect("localhost","gmf","gmf")){
	mysql_select_db("gmfdb") || die("unable to connect to database");
	}
else{
	die("unable to connect");
	}

?>