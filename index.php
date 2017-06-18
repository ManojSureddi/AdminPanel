				<?php
				include('header.php');
				?>
                
                
                		<div class="main clearfix">


                   <?php


//if(isset($_SESSION['useradmin'])){
if(isset($_GET['page'])){
$page=$_GET['page'];
}
else{
$page=md5('home');
}


if($page==md5('home')){
include('home.php');
}
else if($page==md5('Addemployees')){
include('addemployee.php');
}
else if($page==md5('restaurant')){
include('restaurant.php');
}else if($page==md5('addCity')){
include('addcity.php');
}
else if($page==md5('addarea')){
include('addcityarea.php');
}
else if($page==md5('addcat')){
include('itemcategory.php');
}else if($page==md5('viewUsers')){
include('Users.php');
}
else if($page==md5('menu')){
include('menu.php');
}
else if($page==md5('employeestatuschange')){
include('changeempstatus.php');
}
else if($page==md5('vieworders')){
include('orderdbview.php');
}
else if($page==md5('viewallorders')){
include('allorders.php');
}
else if($page==md5('viewemployees')){
include('viewemployees.php');
}
else if($page==md5('viewrestaurant')){
include('viewsrestaurant.php');
}
else if($page==md5('viewdeliverboystatus')){
include('deliveryboystatus.php');
}
else{
include('404.php');
}
/*}
else{
	include('login.php');
	}*/
	
	
?>         
                            
                            
                            
                            
                            
						</div><!-- /main -->
				<?php
				include('footer.php');
				?>